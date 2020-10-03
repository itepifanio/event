<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Subscription;
use App\Models\User;
use App\Services\Dto\CreateSubscriptionDto;
use App\Services\CreateSubscriptionService;
use Illuminate\Support\Facades\Auth;

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

    public function destroy($id)
    {}
}
