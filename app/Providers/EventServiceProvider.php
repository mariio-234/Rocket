<?php

namespace App\Providers;

use App\Events\OrderPaid;
use App\Events\OrderStatus;
use App\Events\UserBaja;
use App\Listeners\SendOrderPaidNotification;
use App\Listeners\SendOrderStatusNotification;
use App\Listeners\SendUserBajaNotification;
use App\Models\Order;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Observers\UserObserver;
use App\Models\User;
use App\Observers\OrderObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        UserBaja::class => [
            SendUserBajaNotification::class,
        ],

        OrderPaid::class => [
            SendOrderPaidNotification::class,
        ],

        OrderStatus::class => [
            SendOrderStatusNotification::class,
        ],
    ];

    protected $observers = [
        User::class => [UserObserver::class],
        Order::class => [OrderObserver::class],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        
        
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
