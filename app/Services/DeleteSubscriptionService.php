<?php

namespace App\Services;

use App\Services\Dto\DeleteSubscriptionDto;
use App\Services\Dto\DtoInterface;
use App\Models\Subscription;
use InvalidArgumentException;

class DeleteSubscriptionService implements ServiceInterface
{
    /**
     * @var DeleteSubscriptionDto
     */
    private $deleteSubscriptionDto;

    /**
     * DeleteSubscriptionService constructor.
     * @param DeleteSubscriptionDto $deleteSubscriptionDto
     */
    public function __construct(DeleteSubscriptionDto $deleteSubscriptionDto)
    {
        $this->deleteSubscriptionDto = $deleteSubscriptionDto;
    }

    /**
     * @return bool
     */
    public function execute(): bool
    {
        Subscription::find($this->deleteSubscriptionDto->id)->delete();

        return true;
    }

    /**
     * @param DtoInterface $dto
     * @return ServiceInterface
     */
    public static function make(DtoInterface $dto): ServiceInterface
    {
        if (!$dto instanceof DeleteSubscriptionDto) {
            throw new InvalidArgumentException('DeleteSubscriptionService needs to receive a DeleteSubscriptionDto.');
        }

        return new DeleteSubscriptionService($dto);
    }
}
