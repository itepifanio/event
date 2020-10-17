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
                            <p>{{ $event->description }}</p>
                            <p>
                                <div class="icon">
                                    <span class="lni-map-marker" style="color: #747373">
                                        {{ $event->address->name }}
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
                            <form action= "{{ route('events.subscription.destroy', [$event->id, $event->subscriptions->where('user_id', '=', auth()->user()->id)[0]->id ]) }}" method="POST">    
                                @method('DELETE')
                                @csrf
                                <button type='submit' class="btn-card" onclick="return confirm('You will be unsubscribed to this event.');"> Unsubscribe </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">Dashboard</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
