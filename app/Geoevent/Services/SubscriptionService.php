<?php

namespace App\Geoevent\Services;

use App\Models\Geoevent\Subscription;
use App\Geoevent\Repositories\SubscriptionRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class SubscriptionService
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

    protected abstract function rules() : array;
}
