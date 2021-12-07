<?php

namespace App\Services;

use App\Models\{User, Event};

class Eventservice
{
    public static function userSubscribedOnEvent(User $user, Event $event)
    {
        return $user->events()->where('id', $event->id)->exists();
    }
}
