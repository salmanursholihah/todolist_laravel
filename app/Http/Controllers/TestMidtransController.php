<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestMidtransController extends Controller
{
    public function simulate(Request $request)
    {
        // Data simulasi sesuai format Midtrans
        $data = [
            "transaction_status" => $request->input('transaction_status', 'settlement'),
            "order_id"           => $request->input('order_id', 'SUBS-1-' . time()),
            "fraud_status"       => $request->input('fraud_status', 'accept'),
            "payment_type"       => $request->input('payment_type', 'gopay'),
            "gross_amount"       => $request->input('gross_amount', '10000.00'),
        ];

        // Kirim langsung ke callback Midtrans kamu
        $response = Http::post(url('/midtrans/callback'), $data);

        return response()->json([
            'message' => 'Callback simulated',
            'sent_data' => $data,
            'response_from_callback' => $response->json(),
        ]);
    }
}
