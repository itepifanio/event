<?php

namespace App\Services\Dto;

class CreateEventDto extends AbstractDto implements DtoInterface
{

    protected $name;
    protected $description;
    protected $start_date;
    protected $end_date;
    protected $address;
    public $address_name;
    public $lat;
    public $lng;

    /* @return array */
    protected function configureValidatorRules(): array
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
        ];
    }

    /**
     * @inheritDoc
     */
    protected function map(array $data): bool
    {
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->start_date = $data['start_date'];
        $this->end_date = $data['end_date'];
        $this->address = $data['address'];
        $this->address_name = $data['address_name'];
        $this->lat = $data['lat'];
        $this->lng = $data['lng'];

        return true;
    }
}
