<?php

namespace App\Services;

use App\Exceptions\UserNotSubscribed;
use App\Geoevent\Services\AttendanceService as GeoAttendanceService;
use App\Models\Geoevent\Event;
use App\Repositories\AttendanceRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AttendanceService extends GeoAttendanceService
{
    private AttendanceRepository $repository;

    public function __construct()
    {
        $this->repository = new AttendanceRepository();
    }

    public function createOrUpdate(Event $event, array $data) : bool
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        if (! $this->areUsersInEvent($event, $data)){
            throw new UserNotSubscribed;
        }

        // adds 'event_id' to the array
        $data = collect($data)->map(function ($item) use ($event) {
            $item['event_id'] = $event->id;

            return $item;
        })->all();

        return $this->repository->createOrUpdate($data);
    }

    protected function rules(): array
    {
        return [
            '*.percentage' => ['required', 'integer', 'between:0,100'],
            '*.user_id' => ['required', 'exists:users,id'],
        ];
    }

    private function areUsersInEvent(Event $event, array $data) : bool
    {
        return $event->users()->pluck('users.id')->all() == Arr::pluck($data, 'user_id');
    }
}
