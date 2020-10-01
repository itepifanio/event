<?php

namespace App\Services;

use App\Services\Dto\EditEventDto;
use App\Services\Dto\DtoInterface;
use App\Models\Event;
use InvalidArgumentException;

class EditEventService implements ServiceInterface
{
    private EditEventDto $editEventDto;

    public function __construct(EditEventDto $editEventDto)
    {
        $this->editEventDto = $editEventDto;
    }

    public function execute(): bool
    {
        $event = Event::find($this->editEventDto->id);

        if(!$event) {
            return false;
        }

        $event->update(
            $this->editEventDto->toArray()
        );

        $event->address()->update([
            'name' => $this->editEventDto->address_name,
            'lat' => $this->editEventDto->lat,
            'lng' => $this->editEventDto->lng,
        ]);

        return true;
    }

    public static function make(DtoInterface $dto): ServiceInterface
    {
        if (!$dto instanceof EditEventDto) {
            throw new InvalidArgumentException('EditEventService needs to receive a EditEventDto.');
        }

        return new EditEventService($dto);
    }
}
