<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyUser extends Mailable
{
    use Queueable, SerializesModels;

    public $userDetail;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userDetail)
    {
        //
        $this->userDetail = $userDetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Epiliam - Verify your email')->view('emails.verification');
    }
}
