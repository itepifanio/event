<?php

namespace App\Services;

use App\Models\Subscription;

class CreateSubscriptionService extends ValidateData implements ServiceInterface
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;

        $this->validator();
    }
    public function configureValidatorRules(): array
    {
        return [
            'user_id' => 'required',
            'event_id' => 'required',
        ];
    }

    public function execute(): bool
    {
        $subscription = Subscription::create($this->data);

        return true;
    }
}
