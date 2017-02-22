<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class Test
 * @package App\Mail
 */
class Test extends Mailable
{
    use Queueable, SerializesModels;


    private $message;

    /**
     * Test constructor.
     * @param $message
     * @param $subject
     */
    public function __construct($message, $subject)
    {
        $this->message = $message;
        $this->subject($subject);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.test')->with(['text' => $this->message]);
    }
}
