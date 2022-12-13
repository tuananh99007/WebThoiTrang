<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($passwordNew)
    {
        //
        $this->password= $passwordNew;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.forgotpassword');
    }
}
