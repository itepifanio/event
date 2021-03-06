<?php

namespace App\Http\Controllers;

use App\Models\Geoevent\Event;
use App\Models\Geoevent\Subscription;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $subscriptions = Subscription::ofUser(Auth::id())->get();
        $subscribed_events_id = $subscriptions->pluck('event_id')->toArray();
        $subscribed_events = Event::with('subscriptions', 'attendances', 'address')->whereIn('id', $subscribed_events_id)->get();

        return view('home', [
            'events' => $subscribed_events
        ]);
    }
}
