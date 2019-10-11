<?php

namespace App\Listeners;

use App\Events\ContactFormSubmitted;
use App\Notifications\UserContactFormSubmitted;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUserContactFormNotification
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
     * @param  ContactFormSubmitted  $event
     * @return void
     */
    public function handle(ContactFormSubmitted $event)
    {
        $dataUser = $this->fillUser($event);
        $user = new User();
        $user->forceFill($dataUser)->notify(new UserContactFormSubmitted($event->contactForm));
    }

    public function fillUser($event)
    {
        return [
            'name' => $event->contactForm->name,
            'email' => $event->contactForm->email,
        ];
    }
}
