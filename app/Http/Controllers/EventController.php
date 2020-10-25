<?php

namespace App\Http\Controllers;

use App\Facades\Geolocalization;
use App\Models\Event;
use App\Models\Organization;
use App\Services\EventService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    private EventService $service;

    public function __construct()
    {
        $this->service = new EventService();
    }

    public function list()
    {
        $geo = Geolocalization::current()->location;
        return view('events.list', [
            'events' => Event::closestTo($geo->lat, $geo->lng)->with('subscriptions')->get()
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
        try {
            $this->service->save($organization, $request->all());

            return redirect()->route('organizations.events.index', [
                'events' => Event::ofOrganization($organization->id)->get(),
                'organization' => $organization,
            ])->with('success', 'Event created with success.');
        } catch (ValidationException $e){
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create event.');
        }
    }

    public function show(Organization $organization, $id)
    {
        return view('events.show', [
            'event' => Event::find($id)->first(),
            'organization' => $organization,
        ]);
    }

    public function edit(Organization $organization, $id)
    {
        return view('events.edit', [
            'event' => Event::find($id)->first(),
            'organization' => $organization,
        ]);
    }

    public function update(Request $request, Organization $organization, Event $event)
    {
        try {
            $this->service->update($event, $request->all());

            return redirect()->route('organizations.events.index', [
                'events' => Event::ofOrganization($organization->id)->get(),
                'organization' => $organization,
            ])->with('success', 'Event updated with success.');
        } catch (ValidationException $e){
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update event.');
        }
    }

    public function destroy(Organization $organization, Event $event)
    {
        try {
            $this->service->delete($event);

            return redirect()->route('organizations.events.index', [
                'events' => Event::ofOrganization($organization->id)->get(),
                'organization' => $organization,
            ])->with('success', 'Event deleted with success.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete event.');
        }
    }
}
