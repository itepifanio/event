<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
        return view('events.attendances.edit', compact('organization', 'event'));
    }

    public function update(Organization $organization, Event $event)
    {
        try {
            $this->service->createOrUpdate($event, request()->all());

            return redirect()
                ->route('organizations.events.attendance.index', [$organization->id, $event->id])
                ->with('success', 'Attendance updated with success.');
        } catch (ValidationException $e){
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update attendance.');
        }
    }
}
