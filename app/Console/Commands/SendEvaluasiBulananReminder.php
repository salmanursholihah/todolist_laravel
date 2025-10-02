<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Mail\EvaluasiBulananReminderMail as EvaluasiBulananMail;
use Illuminate\Support\Facades\Mail;
class SendEvaluasiBulananReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:evaluasi_bulanan';
    protected $description = 'Kirim email reminder ke user yang belum mengisi evaluasi bulanan';

    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all(); // atau filter sesuai kebutuhan
        foreach ($users as $user) {
            Mail::to($user->email)->send(new EvaluasiBulananMail($user));
        }
        sleep(1);
        $this->info('Notifikasi evaluasi bulanan sudah dikirim.');
    }
}
