<?php

namespace App\Services;

use App\Exceptions\EventDoesntBelongOrganization;
use App\Geoevent\Services\EventService as GeoEventService;
use App\Models\Geoevent\Event;
use App\Repositories\EventRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class EventService extends GeoEventService
{
    public function save(array $data) : Event
    {
        $validator = Validator::make($data, $this->rules());

        if($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return (new EventRepository)->save($data);
    }

    public function update(Event $event, array $data) : Event
    {
        $validator = Validator::make($data, $this->rules());

        if($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        if($event->organization->id != $data['organization_id'])
        {
            throw new EventDoesntBelongOrganization;
        }

        return (new EventRepository)->update($event, $data);
    }

    protected function rules() : array
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
