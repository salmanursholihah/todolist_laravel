<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Mail\CatatanReminderMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use PHPUnit\TextUI\Command as TextUICommand;

class SendCatatanReminder extends Command
{
    protected $signature = 'reminder:catatan';
    protected $description = 'Kirim reminder ke user yang belum isi catatan hari ini';

    public function handle()
    {
        $today = Carbon::today();

        // Ambil semua user yang belum buat catatan hari ini
        $usersWithoutCatatan = User::whereDoesntHave('catatans', function ($query) use ($today) {
            $query->whereDate('created_at', $today);
        })->get();

        if ($usersWithoutCatatan->isEmpty()) {
            $this->info("Semua user sudah mengisi catatan hari ini ✅");
            return;
        }

        foreach ($usersWithoutCatatan as $user) {
            Mail::to($user->email)->send(new CatatanReminderMail($user));
            $this->info("Reminder dikirim ke: " . $user->email);

            // Kalau masih pakai Mailtrap free, tambahkan delay
            sleep(1);
        }
    }
}
