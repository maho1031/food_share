<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class SendOrderMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $product;
    public $user;
    public $shop;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($product, $user, $shop)
    {
        //
        $this->product = $product;
        $this->user = $user;
        $this->shop = $shop;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Mail::to($this->product['email'])
        Mail::to($this->shop)
        ->send(new OrderMail($this->product, $this->user, $this->shop));

    }
}
