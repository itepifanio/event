<?php

namespace App\Geoevent\Services;

use App\Exceptions\UserNotSubscribed;
use App\Models\Geoevent\Event;
use App\Geoevent\Repositories\AttendanceRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class AttendanceService
{
    private AttendanceRepository $repository;

    public function __construct()
    {
        $this->repository = new AttendanceRepository();
    }

    protected function createOrUpdate(Event $event, array $data) : bool
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return $this->repository->createOrUpdate($data);
    }

    protected abstract function rules(): array;
}
