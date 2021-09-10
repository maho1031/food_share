<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $user;
    public $shop;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($product, $user, $shop)
    {
        $this->product = $product;
        $this->user = $user;
        $this->shop = $shop;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.order')
        ->subject('商品が注文されました');
    }
}
