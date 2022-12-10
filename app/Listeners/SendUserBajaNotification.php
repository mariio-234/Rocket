<?php

namespace App\Listeners;

use App\Events\UserBaja;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendUserBajaNotification
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
     * @param  \App\Events\UserBaja  $event
     * @return void
     */
    public function handle(UserBaja $event)
    {
        log::debug('HAS DADO DE BAJA EL USUARIO');
    }
}
