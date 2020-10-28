<?php

namespace App\Services;

use App\Models\Subscription;
use App\Repositories\SubscriptionRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SubscriptionService
{
    private SubscriptionRepository $subscriptionRepository;

    public function __construct()
    {
        $this->subscriptionRepository = new SubscriptionRepository();
    }

    public function save(array $data) : Subscription
    {
        $validator = Validator::make($data, $this->rules());

        if($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return $this->subscriptionRepository->save($data);
    }

    public function delete(Subscription $subscription) : void
    {
        $this->subscriptionRepository->delete($subscription);
    }

    private function rules() : array
    {
        return [
            'user_id' => 'required',
            'event_id' => 'required',
        ];
    }
}
