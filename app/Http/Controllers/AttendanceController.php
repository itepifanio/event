<?php

namespace App\Http\Controllers;

use App\Exceptions\UserNotSubscribed;

use App\Models\Geoevent\Event;
use App\Models\Organization;
use App\Services\AttendanceService;
use Illuminate\Validation\ValidationException;

class AttendanceController extends Controller
{
    private AttendanceService $service;

    public function __construct()
    {
        $this->service = new AttendanceService();
    }

    public function index(Organization $organization, Event $event)
    {
        return view('events.attendances.index', compact('organization', 'event'));
    }

    public function edit(Organization $organization, Event $event)
    {
        $users = $event->users()->with([
            'attendances' => fn($q) => $q->where('event_id', $event->id)
        ])->get();

        return view('events.attendances.edit', [
            'event' => $event,
            'organization' => $organization,
            'users' => $users,
        ]);
    }

    public function update(Organization $organization, Event $event)
    {
        try {
            $this->service->createOrUpdate($event, request()->except('_method', '_token'));

            return redirect()
                ->route('organizations.events.attendances.edit', [$organization->id, $event->id])
                ->with('success', 'Attendance updated with success.');
        } catch (ValidationException $e){
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (UserNotSubscribed $e){
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update attendance.');
        }
    }
}
