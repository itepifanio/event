<?php

namespace App\Services;

use App\Services\Dto\DeleteOrganizationDto;
use App\Services\Dto\DtoInterface;
use App\Models\Organization;
use InvalidArgumentException;

class DeleteOrganizationService implements ServiceInterface
{
    private DeleteOrganizationDto $deleteOrganizationDto;

    public function __construct(DeleteOrganizationDto $deleteOrganizationDto)
    {
        $this->deleteOrganizationDto = $deleteOrganizationDto;
    }

    public function execute(): bool
    {
        Organization::find($this->deleteOrganizationDto->id)->delete();

        return true;
    }

    public static function make(DtoInterface $dto): ServiceInterface
    {
        if (!$dto instanceof DeleteOrganizationDto) {
            throw new InvalidArgumentException('DeleteOrganizationService needs to receive a DeleteOrganizationDto.');
        }

        return new DeleteOrganizationService($dto);
    }
}
