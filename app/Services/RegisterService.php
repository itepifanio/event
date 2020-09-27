<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Services\Dto\RegisterDto;
use App\Services\Dto\DtoInterface;
use App\Models\User;
use App\Models\Organization;
use InvalidArgumentException;

class RegisterService implements ServiceInterface
{
    /**
     * @var RegisterDto
     */
    private $registerDto;

    /**
     * RegisterService constructor.
     * @param RegisterDto $registerDto
     */
    public function __construct(RegisterDto $registerDto)
    {
        $this->registerDto = $registerDto;
    }

    /**
     * @return bool
     */
    public function execute(): bool
    {
        $user = User::create([
            'name' => $this->registerDto->name,
            'email' => $this->registerDto->email,
            'password' => Hash::make($this->registerDto->password),
        ]);

        if(isset($this->registerDto->is_organization)){
            Organization::create([
                'user_id' => $user->id,
                'description' => $this->registerDto->description,
                'foundation_date' => $this->registerDto->foundation_date
            ]);
        }

        return true;
    }

    /**
     * @param DtoInterface $dto
     * @return ServiceInterface
     */
    public static function make(DtoInterface $dto): ServiceInterface
    {
        if (!$dto instanceof RegisterDto) {
            throw new InvalidArgumentException('RegisterService needs to receive a RegisterDto.');
        }

        return new RegisterService($dto);
    }
}
