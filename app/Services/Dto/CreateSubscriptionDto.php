<?php

namespace App\Services\Dto;

class CreateSubscriptionDto extends AbstractDto implements DtoInterface
{
    public $user_id;
    public $event_id;

    /**
     * @return array
     */
    protected function configureValidatorRules(): array
    {
        return [
            'user_id' => 'required',
            'event_id' => 'required',
        ];
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function map(array $data): bool
    {
        $this->user_id = $data['user_id'];
        $this->event_id = $data['event_id'];

        return true;
    }
}

