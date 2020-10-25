<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Subscription;
use App\Models\User;
use App\Services\CreateSubscriptionService;
use App\Services\DeleteSubscriptionService;
use Illuminate\Support\Facades\Auth;
use App\Mail\MailSubscription;
use Illuminate\Support\Facades\Mail;

class SubscriptionsController extends Controller
{
    public function index(Event $event)
    {
        $subscriptions = Subscription::ofEvent($event->id)->get();
        $subscribed_users_id = $subscriptions->pluck('user_id')->toArray();
        $subscribed_users = User::whereIn('id', $subscribed_users_id)->get();

        return view('subscriptions.index', [
            'subscriptions' => $subscribed_users,
            'organization' => $event->organization,
            'event' => $event,
        ]);
    }

    public function store(Request $request, Event $event)
    {
        $data = array_merge(
            $request->all(), [
            'event_id' => $event->id,
            'user_id' => Auth::id(),
        ]);

        $createSubscriptionService = new CreateSubscriptionService($data);
        $hasSuccess = $createSubscriptionService->execute();

        if($hasSuccess) {
            Mail::to(Auth::user()->email)->send(new MailSubscription(Auth::user(), $event));
            return redirect()->back()->with('success', 'User subscribed with success.');
        }
        return redirect()->back()->with('erro', 'Failed to subscribe user.');
    }

    public function destroy(Event $event, $id)
    {
        $deleteSubscriptionService = new DeleteSubscriptionService(['id' => $id]);
        $hasSuccess = $deleteSubscriptionService->execute();

        if($hasSuccess) {
            return redirect()->back()->with('success', 'Unsubscribed with success.');
        }
        return redirect()->back()->with('erro', 'Failed to unsubscribe.');
    }
}
