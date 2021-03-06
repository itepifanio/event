<?php

namespace App\Repositories;

use App\Geoevent\Repositories\EventRepository as GeoEventRepository;
use App\Models\Geoevent\Event;

class EventRepository extends GeoEventRepository
{
    public function save(array $data) : Event
    {
        $event = new Event();

        $event->name = $data['name'];
        $event->description = $data['description'];
        $event->start_date = $data['start_date'];
        $event->end_date = $data['end_date'];
        $event->organization_id = $data['organization_id'];

        $event->save();

        $event->address()->create([
            'name' => $data['address_name'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
        ]);

        return $event;
    }

    public function update(Event $event, array $data) : Event
    {
        $event->update($data);

        $event->address()->update([
            'name' => $data['address_name'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
        ]);

        return $event;
    }

    public function delete(Event $event) : void
    {
        $event->delete();
    }
}
