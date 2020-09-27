<?php

namespace App\Services;

use InvalidArgumentException;
use App\Models\Event;

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
        $event = Event::create($this->createEventDto);

        $event->address()->create([
            'name' => $this->createEventDto->address_name,
            'lat' => $this->createEventDto->lat,
            'lng' => $this->createEventDto->lng,
        ]);

        // All is done. We create the user.

        // Everything good. We return the result.
        return true;
    }

    /**
     * @param DtoInterface $dto
     * @return ServiceInterface
     */
    public static function make(DtoInterface $dto): ServiceInterface
    {
        dd($dto);
        // We check if this is a CreateEventDTO
        if (!$dto instanceof CreateEventDto) {
            throw new InvalidArgumentException('CreateEventService needs to receive a CreateEventDto.');
        }


        // All good. We create the instance, and tell the IDE the type of our DTO.
        /* @var CreateEventDto $dto */
        return new CreateEventService($dto);
    }
}
