@extends('layouts.base')

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/card-lists.css') }}">
@endpush

@section('content')
    <div class="container" style="padding-bottom: 15px">
        <div class="row">
            @foreach($events as $event)
                <div class="col-md-4">
                    <div class="card-content">
                        <div class="card-img">
                            <img src="https://placeimg.com/380/230/nature" alt="">
                            <span><h4>{{ round($event->distance, 2) }} km</h4></span>
                        </div>
                        <div class="card-desc">
                            <h3>{{ $event->event_name }}</h3>
                            <div class="desc-box"><p>{{ $event->description }}</p></div>
                            <p>
                                <div class="icon">
                                    <span class="lni-map-marker" style="color: #747373">
                                        {{ $event->address_name }}
                                    </span>
                                </div>
                            </p>
                            <p>
                                <div class="icon">
                                        <span class="lni-calendar" style="color: #747373">
                                            {{ $event->date }}
                                        </span>
                                </div>
                            </p>
                            <div class="multiple-buttons row">
                                @if($event->subscriptions->contains('user_id', auth()->user()->id))      
                                    <form action= "{{ route('events.subscription.destroy', [$event->id, $event->subscriptions->where('user_id', '=', auth()->user()->id)->first()->id ]) }}" method="POST">    
                                        @method('DELETE')
                                        @csrf
                                        <button type='submit' class="btn-card" onclick="return confirm('You will be unsubscribed to this event.');"> Unsubscribe </button>
                                    </form>
                                @else   
                                    @if(App\Models\Organization::find($event->organization_id)->user_id !==  Auth::user()->id)
                                    <form action= "{{ route('events.subscription.store', $event->id) }}" method="POST">
                                        @csrf
                                        <button type='submit' class="btn-card" onclick="return confirm('You will be subscribed to this event.');"> Subscribe </button>
                                    </form>
                                    @endif
                                @endif
                                <!-- <a href="{{ route('events.subscription.store', $event->id) }}" class="btn-card">Subscribe</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
