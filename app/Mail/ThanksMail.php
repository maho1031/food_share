<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ThanksMail extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($product, $user)
    {
        //
        $this->product = $product;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.thanks')
        ->subject('ご購入ありがとうございます。');
    }
}
