<?php

namespace App\Services;

use App\Models\Event;
use App\Models\Organization;
use App\Repositories\EventRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class EventService
{
    private EventRepository $eventRepository;

    public function __construct()
    {
        $this->eventRepository = new EventRepository();
    }

    public function save(Organization $organization, array $data) : Event
    {
        $validator = Validator::make($data, $this->rules());

        if($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return $this->eventRepository->save($organization, $data);
    }

    public function update(Event $event, array $data) : Event
    {
        $validator = Validator::make($data, $this->rules());

        if($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return $this->eventRepository->update($event, $data);
    }

    public function delete(Event $event) : void
    {
        $this->eventRepository->delete($event);
    }

    private function rules() : array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'address_name' => 'required|string',
            'lat' => 'required',
            'lng' => 'required',
        ];
    }
}
