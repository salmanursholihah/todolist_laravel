<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Payment;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $notification = new Notification();

        $orderId = $notification->order_id;
        preg_match('/SUBS-(\d+)-/', $orderId, $matches);
        $subscriptionId = $matches[1] ?? null;

        if (!$subscriptionId) {
            return response()->json(['message' => 'Invalid order ID'], 400);
        }

        $subscription = Subscription::find($subscriptionId);
        $payment = Payment::where('subscription_id', $subscriptionId)
            ->where('order_id', $orderId)
            ->first();

        if (!$subscription || !$payment) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $transactionStatus = $notification->transaction_status;
        $fraudStatus = $notification->fraud_status;

        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'accept') {
                $subscription->status = 'active';
                $subscription->expired_at = now()->addMonths($subscription->plan->duration_month);
                $payment->status = 'success';
            } else {
                $subscription->status = 'pending';
                $payment->status = 'challenge';
            }
        } elseif ($transactionStatus == 'settlement') {
            $subscription->status = 'active';
            $subscription->expired_at = now()->addMonths($subscription->plan->duration_month);
            $payment->status = 'success';
        } elseif (in_array($transactionStatus, ['deny', 'cancel', 'expire'])) {
            $subscription->status = 'cancelled';
            $payment->status = 'failed';
        } elseif ($transactionStatus == 'pending') {
            $payment->status = 'pending';
        }

        $subscription->save();
        $payment->save();

        return response()->json(['message' => 'OK']);
    }
}
