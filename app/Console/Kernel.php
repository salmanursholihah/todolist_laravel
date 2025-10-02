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
     */
    protected function schedule(Schedule $schedule): void
    {
        // Generate Payment bulanan
        $schedule->call(function () {
            $subs = Subscription::where('status', 'active')
                ->whereHas('plan', fn($q) => $q->where('billing_type', 'pascabayar'))
                ->get();

            foreach ($subs as $sub) {
                Payment::create([
                    'subscription_id' => $sub->id,
                    'amount'          => $sub->plan->price,
                    'status'          => 'unpaid',
                ]);
            }
        })->monthly();

        // Reminder Catatan (contoh: tiap menit untuk testing)
        $schedule->command('reminder:catatan')->dailyAt('18.00');
 
        // reminder untuk evaluasi bulanan Setiap tanggal 24 jam 09:00
        $schedule->command('reminder:evaluasi-bulanan')
             ->monthlyOn(24, '09:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
