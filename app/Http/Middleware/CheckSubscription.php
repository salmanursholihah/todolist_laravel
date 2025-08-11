<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
  public function handle($request, Closure $next)
{
    $user = $request->user();
    $sub = $user->subscriptions()->where('status','success')->where('expires_at','>',now())->latest()->first();
    if (!$sub) {
        return redirect()->route('plans.index')->with('msg','Silakan pilih paket');
    }
    return $next($request);
}

}
