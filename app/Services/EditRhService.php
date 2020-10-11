<?php

namespace App\Services;

use App\Models\User;
use App\Services\Dto\DtoInterface;
use App\Services\Dto\editRhDto;
use InvalidArgumentException;

class EditRhService implements ServiceInterface
{
    private EditRhDto $editRhDto;

    public function __construct(EditRhDto $editRhDto)
    {
        $this->editRhDto = $editRhDto;
    }

    public function execute(): bool
    {
        $user = User::find($this->editRhDto->userId);

        $user->update([
            'name'  => $this->editRhDto->name,
            'email' => $this->editRhDto->email,
        ]);

        $user->organizations()->sync([
            $this->editRhDto->organizationId => [
                'role' => $this->editRhDto->role,
            ]
        ]);

        return true;
    }

    public static function make(DtoInterface $dto): ServiceInterface
    {
        if (!$dto instanceof editRhDto) {
            throw new InvalidArgumentException('EditRhService needs to receive a editRhDto.');
        }

        return new EditRhService($dto);
    }
}
