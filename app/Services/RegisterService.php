<?php

namespace App\Services;

use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Services\Dto\RegisterDto;
use App\Services\Dto\DtoInterface;
use App\Models\User;
use App\Models\Organization;
use InvalidArgumentException;

class RegisterService implements ServiceInterface
{
    private RegisterDto $registerDto;

    public function __construct(RegisterDto $registerDto)
    {
        $this->registerDto = $registerDto;
    }

    public function execute(): bool
    {
        $user = User::create([
            'name' => $this->registerDto->name,
            'email' => $this->registerDto->email,
            'password' => Hash::make($this->registerDto->password),
        ]);

        // think a way to put this logic on a new service
        if(isset($this->registerDto->is_organization)){
            Organization::create([
                'user_id' => $user->id,
                'description' => $this->registerDto->description,
                'foundation_date' => $this->registerDto->foundation_date
            ]);

            $user->organizations()->sync([
                $user->id => [
                    'role' => User::ROLES_OWNER,
                ]
            ]);
        }

        return true;
    }

    public static function make(DtoInterface $dto): ServiceInterface
    {
        if (!$dto instanceof RegisterDto) {
            throw new InvalidArgumentException('RegisterService needs to receive a RegisterDto.');
        }

        return new RegisterService($dto);
    }
}
