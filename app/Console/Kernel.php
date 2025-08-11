<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Subscription;
use App\Models\Payment;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

     $schedule->call(function () {
    $subs = Subscription::where('status', 'active')->whereHas('plan', fn($q) => $q->where('billing_type', 'pascabayar'))->get();
    foreach ($subs as $sub) {
        Payment::create([
            'subscription_id' => $sub->id,
            'amount' => $sub->plan->price,
            'status' => 'unpaid',
        ]);
    }
})->monthly(); 
}
    

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
