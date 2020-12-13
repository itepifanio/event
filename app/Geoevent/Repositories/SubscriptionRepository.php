<?php

namespace App\Geoevent\Repositories;

use App\Models\Geoevent\Subscription;

class SubscriptionRepository
{
    public function save(array $data) : Subscription
    {
        $subscription = new Subscription();

        $subscription->user_id = $data['user_id'];
        $subscription->event_id = $data['event_id'];

        $subscription->save();

        return $subscription;
    }

    public function delete(Subscription $subscription) : void
    {
        $subscription->delete();
    }
}
