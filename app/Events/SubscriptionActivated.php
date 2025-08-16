<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use App\Models\Subscription;

class SubscriptionActivated
{
    use SerializesModels;

    public $subscription;

    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }
}
