<?php

namespace App\Services;

use App\Models\Subscription;
use App\Models\Organization;
use InvalidArgumentException;

class CreateSubscriptionService extends ValidateData implements ServiceInterface
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;

        $this->validator();
    }
    public function validator()
    {
        parent::validator();
        
        $organization_user_id= Organization::ofEvent($this->data['event_id'])->first()->user_id;
        
        if($organization_user_id === $this->data['user_id']){
            throw new InvalidArgumentException(
                'Error: user cannot be subscribed to own event'
            );
        }
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
