<?php

namespace App\Http\Controllers\Organization\Event;

use App\Http\Controllers\Controller;
use App\Models\{Event, User};
use App\Services\Eventservice;
use Illuminate\Http\Request;

class EventSubscriptionController extends Controller
{
    public function store(Event $event, Request $request)
    {
        $user = User::findOrFail("$request->user_id");

        if (EventService::userSubscribedOnEvent($user, $event)) {
            return back()->with('warning', 'Este participante já está inscrito neste evento!');
        }

        $user->events()->attach($event->id);

        return back()->with('succes', 'Inscrição no evento realizado com sucesso!');
    }
}
