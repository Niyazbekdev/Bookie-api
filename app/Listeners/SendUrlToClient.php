<?php

namespace App\Listeners;

use App\Events\OrderPaid;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUrlToClient
{

    public function __construct()
    {
        //
    }

    public function handle(OrderPaid $event)
    {
        $event->order->is_paid = true;
        $event->order->save();

        $event->order->books;
        $event->order->save();

        $event->order->user_id;
    }
}
