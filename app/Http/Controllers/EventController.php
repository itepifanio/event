<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\EventStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        return view('events.index', [
            'events' => Event::all()
        ]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(EventStoreRequest $request)
    {
        $event = Event::create(array_merge(
                $request->all(), [
                'organization_id' => Auth::user()->organizations->first()->id
            ])
        );

        $event->address()->create([
            'name' => $request->get('address_name'),
            'lat' => $request->get('lat'),
            'lng' => $request->get('lng'),
        ]);

        return redirect()->route('events.index', [
            'events' => Event::all()
        ])->with('success', 'Event created with success.');
    }

    public function show($id)
    {
        return view('events.show', [
            'event' => Event::find($id)
        ]);
    }

    public function edit($id)
    {
        return view('events.edit', [
            'event' => Event::find($id),
        ]);
    }

    public function update(EventStoreRequest $request, $id)
    {
        Event::find($id)->update(
            array_merge(
                $request->all(),
                ['organization_id' => Auth::user()->organizations->first()->id]
            )
        );

        Event::find($id)->address()->update([
            'name' => $request->get('address_name'),
            'lat' => $request->get('lat'),
            'lng' => $request->get('lng'),
        ]);

        return redirect()->route('events.index', [
            'events' => Event::all()
        ])->with('success', 'Event updated with success.');
    }

    public function destroy($id)
    {
        Event::find($id)->delete();

        return redirect()->route('events.index', [
            'events' => Event::all()
        ])->with('success', 'Event deleted with success.');
    }
}
