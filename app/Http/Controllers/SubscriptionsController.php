<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Payment;
use Carbon\Carbon;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Auth;
use App\Events\SubscriptionActivated;
class SubscriptionsController extends Controller
{
    // Step pemilihan paket langganan
    public function selectPlan()
    {
        $plans = Plan::all();
        return view('subscription.select-plan', compact('plans'));
    }

    // Menyimpan plan yang dipilih ke session
    public function postSelectPlan(Request $request)
    {
        $request->validate(['plan_id' => 'required|exists:plans,id']);
        session(['subscription.plan_id' => $request->plan_id]);
        return redirect()->route('subscription.step', ['step' => 1]);
    }

    // Menampilkan form step input data perusahaan / kontak
    public function showStep($step)
    {
        $planId = session('subscription.plan_id');
        if (!$planId) return redirect()->route('subscription.selectPlan');

        return view("subscription.steps.step{$step}");
    }

    // Menyimpan data tiap step ke session
    public function postStep(Request $request, $step)
    {
        switch ($step) {
            case 1:
                $request->validate([
                    'company_name' => 'required|string',
                    'company_address' => 'required|string',
                ]);
                session(['subscription.step1' => $request->only('company_name', 'company_address')]);
                break;

            case 2:
                $request->validate([
                    'contact_person' => 'required|string',
                    'phone' => 'required|string',
                ]);
                session(['subscription.step2' => $request->only('contact_person', 'phone')]);
                break;
        }

        if ($step < 2) {
            return redirect()->route('subscription.step', ['step' => $step + 1]);
        }

        return redirect()->route('subscription.checkout');
    }

    // Menampilkan halaman checkout sebelum transaksi
    public function checkout()
    {
        $planId = session('subscription.plan_id');
        if (!$planId) return redirect()->route('subscription.selectPlan');

        $plan = Plan::findOrFail($planId);
        $details = array_merge(session('subscription.step1', []), session('subscription.step2', []));

        return view('subscription.checkout', compact('plan', 'details'));
    }

    // Proses pembayaran dengan Midtrans
    public function processPayment(Request $request)
    {
        $planId = session('subscription.plan_id');
        $plan = Plan::findOrFail($planId);
        $details = array_merge(session('subscription.step1', []), session('subscription.step2', []));

        // Simpan subscription ke database sebelum transaksi
        $subscription = Subscription::create([
            'user_id' => Auth::id(),
            'plan_id' => $plan->id,
            'status' => 'pending',
            'start_date' => Carbon::now(),
            'expired_at' => Carbon::now()->addMonth(), // misal paket 1 bulan
            'details' => $details,
        ]);

        // Buat order_id
        $orderId = 'SUBS-' . $subscription->id . '-' . time();
        $subscription->order_id = $orderId;
        $subscription->save();

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $plan->price,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        // Simpan payment
        Payment::create([
            'subscription_id' => $subscription->id,
            'amount' => $plan->price,
            'status' => 'pending',
            'order_id' => $orderId,
            'snap_token' => $snapToken,
        ]);

        return view('subscription.payment', compact('snapToken'));
    }

    // Callback dari Midtrans

public function callback(Request $request)
{
    $orderId = $request->order_id;
    $transactionStatus = $request->transaction_status ?? 'pending';

    $subscription = Subscription::where('order_id', $orderId)->first();
    if (!$subscription) return response()->json(['error' => 'Subscription not found'], 404);

    if (in_array($transactionStatus, ['settlement', 'capture'])) {
        $subscription->status = 'active';
        $subscription->start_date = Carbon::now();
        $subscription->expired_at = Carbon::now()->addMonth();
        $subscription->save();

        // Trigger event
        event(new SubscriptionActivated($subscription));

        return redirect()->route('absensi.dashboard')->with('success', 'Langganan aktif dan semua payment diperbarui!');
    }

    return redirect()->route('subscription.checkout')->with('error', 'Transaksi belum selesai.');
}
}
