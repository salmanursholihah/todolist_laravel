<?php

namespace App\Listeners;

use App\Events\SubscriptionActivated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdatePendingPayments
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
     public function handle(SubscriptionActivated $event)
    {
        $subscription = $event->subscription;

        // Update semua payment yang masih pending menjadi active
        $subscription->payments()->where('status', 'pending')->update(['status' => 'active']);
    }
}
