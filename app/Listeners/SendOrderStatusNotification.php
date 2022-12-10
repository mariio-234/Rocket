<?php

namespace App\Listeners;

use App\Events\OrderStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendOrderStatusNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderStatus  $event
     * @return void
     */
    public function handle(OrderStatus $event)
    {
        log::debug('HA CAMBIADO EL ESTADO');
    }
}
