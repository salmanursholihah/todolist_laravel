<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Payment;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use Illuminate\Support\Facades\Log;

class SubscriptionsController extends Controller
{
    public function selectPlan()
    {
        $plans = Plan::all();
        return view('subscription.select-plan', compact('plans'));
    }

    public function postSelectPlan(Request $request)
    {
        $request->validate(['plan_id' => 'required|exists:plans,id']);
        session(['subscription.plan_id' => $request->plan_id]);
        return redirect()->route('subscription.step', ['step' => 1]);
    }

    public function showStep($step)
    {
        $planId = session('subscription.plan_id');
        if (!$planId) {
            return redirect()->route('subscription.selectPlan');
        }
        return view("subscription.steps.step{$step}");
    }

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

    public function checkout()
    {
        $planId = session('subscription.plan_id');
        if (!$planId) return redirect()->route('subscription.selectPlan');

        $plan = Plan::findOrFail($planId);
        $details = array_merge(session('subscription.step1', []), session('subscription.step2', []));

        return view('subscription.checkout', compact('plan', 'details'));
    }

    public function processPayment(Request $request)
    {
        $planId = session('subscription.plan_id');
        $plan = Plan::findOrFail($planId);

        $subscription = Subscription::create([
            'user_id' => auth()->id(),
            'plan_id' => $plan->id,
            'status' => 'pending',
            'expired_at' => null,
            'details' => array_merge(session('subscription.step1', []), session('subscription.step2', [])),
        ]);

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $orderId = 'SUBS-' . $subscription->id . '-' . time();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $plan->price,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        Payment::create([
            'subscription_id' => $subscription->id,
            'amount' => $plan->price,
            'status' => 'pending',
            'order_id' => $orderId,
            'snap_token' => $snapToken,
        ]);

        return view('subscription.payment', compact('snapToken'));
    }
}
