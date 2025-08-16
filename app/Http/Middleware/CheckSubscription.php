<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSubscription
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Jika user belum berlangganan atau sudah expired
        if (!$user->isSubscribed()) {
            return redirect()->route('subscription.selectPlan')
                ->with('error', 'Anda harus berlangganan untuk mengakses dashboard.');
        }

        return $next($request);
    }
}
