<?php

namespace App\Services;

use App\Services\Dto\CreateSubscriptionDto;
use App\Services\Dto\DtoInterface;
use App\Models\Subscription;
use InvalidArgumentException;

class CreateSubscriptionService implements ServiceInterface
{
    /**
     * @var CreateSubscriptionDto
     */
    private $createSubscriptionDto;

    /**
     * CreateEventService constructor.
     * @param CreateSubscriptionDto $createSubscriptionDto
     */
    public function __construct(CreateSubscriptionDto $createSubscriptionDto)
    {
        $this->createSubscriptionDto = $createSubscriptionDto;
    }

    /**
     * @return bool
     */
    public function execute(): bool
    {    
        if(Subscription::where([
            ['user_id', $this->createSubscriptionDto->user_id], 
            ['event_id', $this->createSubscriptionDto->event_id ]
            ])->exists())
        {
            return false;
        }
       
        $subscription = Subscription::create($this->createSubscriptionDto->toArray());
        return true;
    }

    /**
     * @param DtoInterface $dto
     * @return ServiceInterface
     */
    public static function make(DtoInterface $dto): ServiceInterface
    {
        if (!$dto instanceof CreateSubscriptionDto) {
            throw new InvalidArgumentException('CreateSubscriptionService needs to receive a CreateSubscriptionDto.');
        }

        return new CreateSubscriptionService($dto);
    }
}
