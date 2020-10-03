<?php

namespace App\Services;

use App\Services\Dto\DeleteEventDto;
use App\Services\Dto\DtoInterface;
use App\Models\Event;
use InvalidArgumentException;

class DeleteEventService implements ServiceInterface
{
    private DeleteEventDto $deleteEventDto;

    public function __construct(DeleteEventDto $deleteEventDto)
    {
        $this->deleteEventDto = $deleteEventDto;
    }

    /**
     * @return bool
     */
    public function execute(): bool
    {
        Event::find($this->deleteEventDto->id)->delete();

        return true;
    }

    /**
     * @param DtoInterface $dto
     * @return ServiceInterface
     */
    public static function make(DtoInterface $dto): ServiceInterface
    {
        if (!$dto instanceof DeleteEventDto) {
            throw new InvalidArgumentException('DeleteEventService needs to receive a DeleteEventDto.');
        }

        return new DeleteEventService($dto);
    }
}
