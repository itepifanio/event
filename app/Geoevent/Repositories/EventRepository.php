<?php

namespace App\Geoevent\Repositories;

use App\Geoevent\Facades\Geolocalization;
use App\Models\Geoevent\Event;
use Illuminate\Database\Eloquent\Collection;

class EventRepository
{
    public function save(array $data) : Event
    {
        $event = new Event();

        $event->name = $data['name'];
        $event->description = $data['description'];
        $event->start_date = $data['start_date'];
        $event->end_date = $data['end_date'];

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

    public function getEventsByLocation(int $lat, int $lng) : Collection
    {
        return Event::closestTo($lat, $lng)->with('subscriptions')->get();
    }

    public function getUserCurrentLocation()
    {
        return Geolocalization::current();
    }
}
