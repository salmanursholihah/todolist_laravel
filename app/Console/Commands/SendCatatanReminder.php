<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Mail\CatatanReminderMail;
use Illuminate\Support\Facades\Mail;

class SendCatatanReminder extends Command
{
    protected $signature = 'reminder:catatan';
    protected $description = 'Kirim email reminder ke user yang belum isi catatan harian';

    public function handle()
    {
        $today = now()->toDateString();

        $usersWithoutCatatan = User::whereDoesntHave('catatans', function ($query) use ($today) {
            $query->whereDate('created_at', $today);
        })->get();

        foreach ($usersWithoutCatatan as $user) {
            Mail::to($user->email)->send(new CatatanReminderMail($user));
            $this->info("Reminder dikirim ke: " . $user->email);
        }

        return Command::SUCCESS;
    }
}
