<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contactmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $sendEmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sendEmail)
    {
        $this->sendEmail = $sendEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Contact Us Mail')->view('mails.contactmails');
    }
}
