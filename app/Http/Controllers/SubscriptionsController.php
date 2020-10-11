<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Subscription;
use App\Models\User;
use App\Services\Dto\CreateSubscriptionDto;
use App\Services\Dto\DeleteSubscriptionDto;
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

    public function create(){}  // não tem create. Lembrar de remover a rota

    public function store(Request $request, Event $event)
    {   
        $data = array_merge(
            $request->all(), [
            'event_id' => $event->id,
            'user_id' => Auth::id(),
        ]);

        $createSubscriptionDto = new CreateSubscriptionDto($data);

        $createSubscriptionService = CreateSubscriptionService::make($createSubscriptionDto);

        $hasSuccess = $createSubscriptionService->execute();

        if($hasSuccess) {
            Mail::to(Auth::user()->email)->send(new MailSubscription(Auth::user(), $event)); 
            return redirect()->back()->with('success', 'User subscribed with success.');
        }
        return redirect()->back()->with('erro', 'Failed to subscribe user.');
    }

    public function show($id)
    {}

    public function edit($id)
    {}

    public function update($id)
    {}

    public function destroy(Event $event, $id)
    {
        $deleteSubscriptionDto = new DeleteSubscriptionDto([ 'id' => $id ]);

        $deleteSubscriptionService = DeleteSubscriptionService::make($deleteSubscriptionDto);

        $hasSuccess = $deleteSubscriptionService->execute();

        if($hasSuccess) {
            return redirect()->route('home')->with('success', 'Unsubscribed with success.');
        }

        return redirect()->back()->with('erro', 'Failed to unsubscribe.');
    }
}
