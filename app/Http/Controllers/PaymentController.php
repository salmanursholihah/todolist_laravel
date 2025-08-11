<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Payment;


class PaymentController extends Controller
{
    /**
     * Handle the checkout process.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
public function checkout(Request $request)
{
    $request->validate(['plan_id' => 'required|exists:plans,id']);

    $user = auth()->user();
    $plan = Plan::findOrFail($request->plan_id);

    // Generate order_id unik
    $orderId = 'ORDER-' . Str::random(10) . '-' . time();

    // Simpan subscription dengan order_id
    $subscription = Subscription::create([
        'user_id'   => $user->id,
        'plan_id'   => $plan->id,
        'order_id'  => $orderId,
        'amount'    => $plan->price,
        'status'    => 'pending',
        'start_date'=> now(),
        'end_date'  => null, // Atur sesuai kebutuhan jika ada durasi
    ]);

    // Konfigurasi Midtrans
    Config::$serverKey = config('midtrans.server_key');
    Config::$isProduction = config('midtrans.is_production');
    Config::$isSanitized = true;
    Config::$is3ds = config('midtrans.is_3ds');

    $params = [
        'transaction_details' => [
            'order_id' => $orderId,
            'gross_amount' => (int) $plan->price,
        ],
        'item_details' => [[
            'id' => $plan->id,
            'price' => (int) $plan->price,
            'quantity' => 1,
            'name' => $plan->name,
        ]],
        'customer_details' => [
            'first_name' => $user->name,
            'email' => $user->email,
        ],
    ];

    try {
        $snapToken = Snap::getSnapToken($params);

        // Simpan data pembayaran
        Payment::create([
            'user_id'        => $user->id,
            'subscription_id'=> $subscription->id,
            'order_id'       => $orderId,
            'amount'         => $plan->price,
            'status'         => 'pending',
            'snap_token'     => $snapToken,
        ]);

        return response()->json(['snap_token' => $snapToken, 'order_id' => $orderId]);
    } catch (\Exception $e) {
        Log::error('Midtrans error: ' . $e->getMessage());
        return response()->json(['error' => 'Gagal membuat transaksi', 'details' => $e->getMessage()], 500);
    }
}


}
