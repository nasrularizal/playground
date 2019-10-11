<?php

namespace App\Providers;

use App\Events\ContactFormSubmitted;
use App\Listeners\SendContactFormNotification;
use App\Listeners\SendUserContactFormNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ContactFormSubmitted::class => [
            SendContactFormNotification::class,
            SendUserContactFormNotification::class
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        parent::boot();
    }
}
