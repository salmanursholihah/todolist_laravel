<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class AdminSubscriptionController extends Controller
{

    // Tampilkan semua subscription
    public function index()
    {
        $subscriptions = Subscription::with('user', 'plan')->orderBy('created_at', 'desc')->get();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    // Ubah status subscription menjadi active
    public function activate($id)
    {
        $subscription = Subscription::findOrFail($id);

        if ($subscription->status === 'active') {
            return redirect()->back()->with('info', 'Subscription sudah aktif.');
        }

        $subscription->status = 'active';
        $subscription->start_date = now();
        $subscription->expired_at = now()->addMonth(); // bisa disesuaikan sesuai paket
        $subscription->save();

        // Update payment jika masih pending
        $subscription->payments()->where('status', 'pending')->update(['status' => 'active']);

        return redirect()->back()->with('success', 'Subscription berhasil diaktifkan!');
    }
}

