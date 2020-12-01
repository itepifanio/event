<?php

namespace App\Http\Controllers;

use App\Models\Geoevent\Event;
use App\Models\Geoevent\Subscription;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\SubscriptionService;
use Illuminate\Support\Facades\Auth;
use App\Mail\MailSubscription;
use Illuminate\Support\Facades\Mail;

class SubscriptionsController extends Controller
{
    private SubscriptionService $service;

    public function __construct()
    {
        $this->service = new SubscriptionService();
    }
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
        try {
            $data = array_merge(
                $request->all(), [
                'event_id' => $event->id,
                'user_id' => Auth::id(),
            ]);
            $this->service->save($data);

            Mail::to(Auth::user()->email)->send(new MailSubscription(Auth::user(), $event));
            return redirect()->back()->with('success', 'User subscribed with success.');

        } catch (ValidationException $e){
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to subscribe user.');
        }
    }

    public function destroy(Event $event, $id)
    {
        $subscription = Subscription::find($id)->first();

        try {
            $this->service->delete($subscription);
            return redirect()->back()->with('success', 'Unsubscribed with success.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to unsubscribe.');
        }
    }
}
