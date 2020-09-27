<?php

namespace App\Services\Dto;

class EditEventDto extends AbstractDto implements DtoInterface
{
    public $name;
    public $description;
    public $start_date;
    public $end_date;
    public $address;
    public $address_name;
    public $lat;
    public $lng;
    public $organization_id;

    /**
     * @return array
     */
    protected function configureValidatorRules(): array
    {
        return [
            'id' => 'required',
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

    /**
     * @param array $data
     * @return bool
     */
    protected function map(array $data): bool
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->start_date = $data['start_date'];
        $this->end_date = $data['end_date'];
        $this->address = $data['address'];
        $this->address_name = $data['address_name'];
        $this->lat = $data['lat'];
        $this->lng = $data['lng'];
        $this->organization_id = $data['organization_id'];

        return true;
    }
}
