<?php

namespace App\Listeners;

use App\Events\OrderPlacedEvent;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use App\Services\UserWithRole;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationToAdmins
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
     * @param  \Illuminate\Auth\Events\OrderPlacedEvent  $event
     * @return void
     */
    public function handle(OrderPlacedEvent $event)
    {
        $admins = (new UserWithRole('Administrator'))->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewOrderNotification($event->orders));
        }
    }
}
