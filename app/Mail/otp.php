<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class otp extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
 
    /**
     * Build the message.
  
     * @return $this
     */
	 public function __construct($otp)
    {
        $this->otp = $otp;
    }
    public function build()
    {
              return $this->view('mails.otp')
                    ->with([
                        'otp' => $this->otp,
                        
                    ]);
    }
}
