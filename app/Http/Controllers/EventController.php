<?php

namespace App\Http\Controllers;

use App\Facades\Geolocalization;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Organization;
use App\Services\Dto\CreateEventDto;
use App\Services\Dto\EditEventDto;
use App\Services\Dto\DeleteEventDto;
use App\Services\CreateEventService;
use App\Services\EditEventService;
use App\Services\DeleteEventService;

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

        $createEventDto = new CreateEventDto($data);

        $createEventService = CreateEventService::make($createEventDto);

        $hasSuccess = $createEventService->execute();

        if($hasSuccess) {
            return redirect()->route('organizations.events.index', [
                'events' => Event::ofOrganization($organization->id)->get(),
                'organization' => $organization,
            ])->with('success', 'Event created with success.');
        }

        return redirect()->back()->with('error', 'Failed to create event.');
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

    public function update(Request $request, Organization $organization, $id)
    {
        $data = array_merge(
            $request->all(), [
            'id' => $id,
            'organization_id' => $organization->id,
        ]);

        $editEventDto = new EditEventDto($data);

        $editEventService = EditEventService::make($editEventDto);

        $hasSuccess = $editEventService->execute();

        if($hasSuccess) {
            return redirect()->route('organizations.events.index', [
                'events' => Event::ofOrganization($organization->id)->get(),
                'organization' => $organization,
            ])->with('success', 'Event updated with success.');
        }

        return redirect()->back()->with('error', 'Failed to update event.');
    }

    public function destroy(Organization $organization, $id)
    {
        $deleteEventDto = new DeleteEventDto([ 'id' => $id ]);

        $deleteEventService = DeleteEventService::make($deleteEventDto);

        $hasSuccess = $deleteEventService->execute();

        if($hasSuccess) {
            return redirect()->route('organizations.events.index', [
                'events' => Event::ofOrganization($organization->id)->get(),
                'organization' => $organization,
            ])->with('success', 'Event deleted with success.');
        }

        return redirect()->back()->with('error', 'Failed to delete event.');
    }
}
