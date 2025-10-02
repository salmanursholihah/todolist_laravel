<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EvaluasiBulananReminderMail extends Mailable
{
    use Queueable, SerializesModels;
      public $user;

    /**
     * Create a new message instance.
     */


    public function __construct($user)
    {
       $this->user = $user;
    }
   public function build()
{
    return $this->subject('Peringatan: Evaluasi Bulanan Belum Diisi')
                ->view('emails.evaluasi_bulanan')
                ->with([
                    'user' => $this->user,
                ]);
}

}
