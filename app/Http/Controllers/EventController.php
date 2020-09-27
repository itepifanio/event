<?php

namespace App\Http\Controllers;

use App\Facades\Geolocalization;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Organization;
use App\Services\Dto\CreateEventDto;
use App\Services\CreateEventService;

class EventController extends Controller
{
    public function list(){
        $geo = Geolocalization::current()->location;

        return view('events.list', [
            'events' => Event::closestTo($geo->lat, $geo->lng)->get()
        ]);
    }

    public function index(Organization $organization)
    {
        return view('events.index', [
            'events' => Event::ofOrganization($organization->id)->get(),
            'organization' => $organization,
        ]);
    }

    public function create(Organization $organization)
    {
        return view('events.create', [
            'organization' => $organization,
        ]);
    }

    public function store(Request $request, Organization $organization)
    {
        $data = array_merge(
            $request->all(), [
            'organization_id' => $organization->id,
        ]);

        // dd($data);
        // First, we create the DTO. We need it to use the service.
        $createEventDto = new CreateEventDto($data);

        // dd($createEventDto instanceof DtoInterface);

        // Now we have the DTO. We also know that he is valid.
        // Let's make our service, and execute it.
        $createEventService = CreateEventService::make($createEventDto);

        $success = $createEventService->execute();

        if($success) {
            return redirect()->route('organizations.events.index', [
                'events' => Event::ofOrganization($organization->id)->get(),
                'organization' => $organization,
            ])->with('success', 'Event created with success.');
        }

        return redirect()->back()->with('erro', 'Failed to create event.');
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
            'events' => Event::ofOrganization($organization->id)->get(),
            'organization' => $organization
        ])->with('success', 'Event updated with success.');
    }

    public function destroy(Organization $organization, $id)
    {
        Event::find($id)->delete();

        return redirect()->route('organizations.events.index', [
            'events' => Event::ofOrganization($organization->id)->get(),
            'organization' => $organization,
        ])->with('success', 'Event deleted with success.');
    }
}
