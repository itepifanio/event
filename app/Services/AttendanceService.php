<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\Event;
use App\Repositories\AttendanceRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AttendanceService
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
        // TODO::Create custom validation user not subscribed on event

        // adds 'event_id' to the array
        $data = collect($data)->map(function ($item) use ($event) {
            $item['event_id'] = $event->id;

            return $item;
        })->all();

        return $this->repository->createOrUpdate($data);
    }

    private function rules(): array
    {
        return [
            '*.percentage' => ['required', 'integer', 'between:0,100'],
            '*.user_id' => ['required', 'exists:users,id'],
        ];
    }
}
