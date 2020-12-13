<?php

namespace App\Services;

use App\Models\Geoevent\Subscription;
use App\Repositories\SubscriptionRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Geoevent\Services\SubscriptionService as GeoSubscriptionService;

class SubscriptionService extends GeoSubscriptionService
{
    private SubscriptionRepository $subscriptionRepository;

    public function __construct()
    {
        $this->subscriptionRepository = new SubscriptionRepository();
    }

    protected function rules() : array
    {
        return [
            'user_id' => 'required',
            'event_id' => 'required',
        ];
    }
}
