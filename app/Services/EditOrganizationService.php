<?php

namespace App\Services;

use App\Services\Dto\EditOrganizationDto;
use App\Services\Dto\DtoInterface;
use App\Models\Organization;
use App\Models\User;
use InvalidArgumentException;

class EditOrganizationService implements ServiceInterface
{
    private EditOrganizationDto $editOrganizationDto;

    public function __construct(EditOrganizationDto $editOrganizationDto)
    {
        $this->editOrganizationDto = $editOrganizationDto;
    }

    public function execute(): bool
    {
        $organization = Organization::find($this->editOrganizationDto->id);
        if(!$organization) {
            return false;
        }

        $updated = $organization->update($this->editOrganizationDto->toArray());

        $user_organization = User::find($organization->user_id);
        if(!$user_organization) {
            return false;
        }

        $user_organization->update($this->editOrganizationDto->toArray());

        return true;
    }

    public static function make(DtoInterface $dto): ServiceInterface
    {
        if (!$dto instanceof EditOrganizationDto) {
            throw new InvalidArgumentException('EditOrganizationService needs to receive a EditOrganizationDto.');
        }

        return new EditOrganizationService($dto);
    }
}
