<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Payment;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;
use Illuminate\Support\Facades\Log;

class MidtransController extends Controller
{

    public function callback(Request $request)
    {
        // Ambil data transaksi dari Midtrans
        $orderId = $request->order_id;
        $transactionStatus = $request->transaction_status ?? 'pending';
        $paymentType = $request->payment_type ?? null;
        $grossAmount = $request->gross_amount ?? 0;
        $customerDetails = $request->customer_details ?? [];

        $user = Auth::user();

        // Simpan ke database subscription
        $subscription = Subscription::updateOrCreate(
            ['order_id' => $orderId],
            [
                'user_id' => $user->id,
                'status' => $transactionStatus,
                'payment_type' => $paymentType,
                'amount' => $grossAmount,
                'meta' => json_encode([
                    'phone' => $customerDetails['phone'] ?? '',
                    'company_name' => $customerDetails['company_name'] ?? '',
                    'contact_person' => $customerDetails['contact_person'] ?? '',
                    'company_address' => $customerDetails['company_address'] ?? '',
                ]),
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonth(), // misal 1 bulan langganan
            ]
        );

        // Redirect ke dashboard setelah transaksi sukses
        if ($transactionStatus === 'settlement' || $transactionStatus === 'capture') {
            return redirect()->route('absensi.dashboard')->with('success', 'Langganan aktif!');
        }

        return redirect()->route('subscription.choose')->with('error', 'Transaksi belum selesai.');
    }

    private function activateSubscription($subscription, $payment)
    {
        $duration = $subscription->plan->duration_month ?? 1;

        // Update subscription
        $subscription->status = 'active';
        $subscription->start_date = now();
        $subscription->end_date = now()->addMonths($duration);
        $subscription->expired_at = now()->addMonths($duration);
        $subscription->save();

        // Update payment
        $payment->status = 'success';
        $payment->save();

        // Update user
        if ($subscription->user) {
            $user = $subscription->user;
            $user->status_langganan = 'aktif';
            $user->tanggal_expired = now()->addMonths($duration);
            $user->save();
        }

        Log::info('Subscription Activated', [
            'subscription_id' => $subscription->id,
            'user_id' => $subscription->user_id,
            'start_date' => $subscription->start_date,
            'end_date' => $subscription->end_date
        ]);
    }
}
