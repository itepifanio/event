<?php

namespace App\Services;

use App\Models\Subscription;

class DeleteSubscriptionService extends ValidateData implements ServiceInterface
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;

        $this->validator();
    }

    public function configureValidatorRules(): array
    {
        return ['id' => 'required'];
    }

    public function execute(): bool
    {
        Subscription::find($this->data['id'])->delete();

        return true;
    }
}
