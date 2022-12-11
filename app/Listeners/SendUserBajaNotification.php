<?php

namespace App\Listeners;

use App\Events\UserBaja;
use App\Mail\EmailBaja;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        Mail::to($event->user->email)->send(new EmailBaja ($event->user));
    }
}
