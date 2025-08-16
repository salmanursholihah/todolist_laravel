<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
 public function handle($request, Closure $next)
{
    if(auth()->check() && auth()->user()->isSubscribed()){
        return $next($request);
    }

    return redirect()->route('subscription.index') // halaman langganan
                     ->with('error', 'Anda harus berlangganan untuk mengakses fitur ini.');
}

}
