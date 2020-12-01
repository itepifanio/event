<?php

namespace App\Geoevent\Services;

use App\Geoevent\Facades\Geolocalization;
use App\Models\Geoevent\Event;
use App\Geoevent\Repositories\EventRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class EventService
{
    private EventRepository $eventRepository;

    public function __construct()
    {
        $this->eventRepository = new EventRepository();
    }

    public function save(array $data) : Event
    {
        $validator = Validator::make($data, $this->rules());

        if($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return $this->eventRepository->save($data);
    }

    protected function update(Event $event, array $data) : Event
    {
        $validator = Validator::make($data, $this->rules());

        if($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return $this->eventRepository->update($event, $data);
    }

    public function listEvents() : Collection
    {
        $geo = Geolocalization::current()->location;

        return $this->eventRepository->getEventsByLocation($geo->lat, $geo->lng);
    }

    public function delete(Event $event) : void
    {
        $this->eventRepository->delete($event);
    }

    protected abstract function rules() : array;
}
