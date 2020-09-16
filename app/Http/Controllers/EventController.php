<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\EventRequest;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function list(){
        return view('events.list', [
            'events' => Event::all(),
            'organizations'=>Organization::all()->keyBy('id')]);
    }

    public function index(Organization $organization)
    {
        return view('events.index', [
            'events' => Event::all(),
            'organization' => $organization,
        ]);
    }

    public function create(Organization $organization)
    {
        return view('events.create', [
            'organization' => $organization,
        ]);
    }

    public function store(EventRequest $request, Organization $organization)
    {
        $event = Event::create(
            array_merge(
                $request->all(), [
                'organization_id' => $organization->id,
            ])
        );

        $event->address()->create([
            'name' => $request->get('address_name'),
            'lat' => $request->get('lat'),
            'lng' => $request->get('lng'),
        ]);

        return redirect()->route('organizations.events.index', [
            'events' => Event::all(),
            'organization' => $organization,
        ])->with('success', 'Event created with success.');
    }

    public function show(Organization $organization, $id)
    {
        return view('events.show', [
            'event' => Event::find($id),
            'organization' => $organization,
        ]);
    }

    public function edit(Organization $organization, $id)
    {
        return view('events.edit', [
            'event' => Event::find($id),
            'organization' => $organization,
        ]);
    }

    public function update(EventRequest $request, Organization $organization, $id)
    {
        Event::find($id)->update(
            array_merge(
                $request->all(),
                ['organization_id' => $organization->id]
            )
        );

        Event::find($id)->address()->update([
            'name' => $request->get('address_name'),
            'lat' => $request->get('lat'),
            'lng' => $request->get('lng'),
        ]);

        return redirect()->route('organizations.events.index', [
            'events' => Event::all(),
            'organization' => $organization
        ])->with('success', 'Event updated with success.');
    }

    public function destroy(Organization $organization, $id)
    {
        Event::find($id)->delete();

        return redirect()->route('organizations.events.index', [
            'events' => Event::all(),
            'organization' => $organization,
        ])->with('success', 'Event deleted with success.');
    }
}
