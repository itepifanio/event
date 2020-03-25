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
                            <a href="#" class="btn-card">Subscribe</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection