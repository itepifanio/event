<?php

namespace App\Services;

use App\Services\Dto\CreateEventDto;
use App\Services\Dto\DtoInterface;
use App\Models\Event;
use InvalidArgumentException;

class CreateEventService implements ServiceInterface
{
    /**
     * @var CreateEventDto
     */
    private $createEventDto;

    /**
     * CreateEventService constructor.
     * @param CreateEventDto $createEventDto
     */
    public function __construct(CreateEventDto $createEventDto)
    {
        $this->createEventDto = $createEventDto;
    }

    /**
     * @return bool
     */
    public function execute(): bool
    {
        $event = Event::create($this->createEventDto->toArray());

        $event->address()->create([
            'name' => $this->createEventDto->address_name,
            'lat' => $this->createEventDto->lat,
            'lng' => $this->createEventDto->lng,
        ]);

        return true;
    }

    /**
     * @param DtoInterface $dto
     * @return ServiceInterface
     */
    public static function make(DtoInterface $dto): ServiceInterface
    {
        if (!$dto instanceof CreateEventDto) {
            throw new InvalidArgumentException('CreateEventService needs to receive a CreateEventDto.');
        }

        return new CreateEventService($dto);
    }
}
