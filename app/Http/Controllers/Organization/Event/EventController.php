<?php

namespace App\Http\Controllers\Organization\Event;

use App\Http\Controllers\Controller;
use App\Models\{Event, User};
use App\Http\Requests\Organization\Event\EventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::query();

        if (isset($request->search) && $request->search !== '') {
            $events->where('name', 'like', '%'.$request->search.'%');
        }

        return view('Organization.Events.index',[
            'events'=> $events->paginate(5),
            'search' => isset($request->search) ? $request->search : ''
        ]);

    }

    public function create()
    {
        return view('Organization.Events.create');
    }

    public function store(EventRequest $request)
    {
        Event::create($request->validated());

        return redirect()
        ->route('organization.events.index')
        ->with('success', 'Evento cadastrado com sucesso!');
    }

    public function show(Event $event)
    {
        return view('organization.events.show', [
            'event' => $event,
            'allParticipantUsers' => User::query()
                ->where('role', 'participant')
                ->get()
        ]);
    }

    public function edit(Event $event)
    {
        return view('organization.events.edit', [
            'event' => $event
        ]);
    }

    public function update(Event $event, EventRequest $request)
    {
        $event->update($request->validated());

        return redirect()
            ->route('organization.events.index')
            ->with('succes', 'Evento atualizado com sucesso!');
    }

     public function destroy(Event $event)
     {
         $event->delete();

         return redirect()
         ->route('organization.events.index')
         ->with('succes', 'Evento deletado com sucesso');
     }
}
