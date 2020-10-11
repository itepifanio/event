<?php

namespace App\Services;

use App\Models\Event;

class CreateEventService extends ValidateData implements ServiceInterface
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;

        $this->validator();
    }

    public function configureValidatorRules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'address' => 'required|string',
            'address_name' => 'required|string',
            'lat' => 'required',
            'lng' => 'required',
            'organization_id' => 'required',
        ];
    }

    public function execute(): bool
    {
        $event = Event::create($this->data);

        $event->address()->create([
            'name' => $this->data['address_name'],
            'lat' => $this->data['lat'],
            'lng' => $this->data['lng'],
        ]);

        return true;
    }
}
