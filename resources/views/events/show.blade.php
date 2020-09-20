@extends('layouts.base')

@push('stylesheets')
    <style>
        #map {
            height: 50vh;
            margin-top: 20px;
            display: block;
        }
    </style>
@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8 offset-md-2">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $event->name }}</h3>
                        </div>
                        <div class="card-body">

                            {{--<div class="col-md-10 offset-md-1" style="margin-top:16px; margin-bottom: 26px;">--}}
                                {{--<img src="{{ asset('dist/img/photo1.png') }}" width="100%">--}}
                            {{--</div>--}}

                            <p><b>Description</b></p>
                            <p>{{ $event->description }}</p>

                            <p><b>Start date</b></p>
                            <p>{{ $event->start_date }}</p>

                            <p><b>End date</b></p>
                            <p>{{ $event->end_date }}</p>

                            <p><b>Address</b></p>
                            <p>{{ $event->address->name }}</p>

                            <div id="map"></div>
                        </div>
                        <div class="card-footer">
<<<<<<< HEAD
                            <a href="{{ route('organizations.events.index', $organization->id) }}" class="btn btn-default">Back to list</a>
=======
                            <a href="{{ route('events.list') }}" class="btn btn-default">Back to list</a>
>>>>>>> issue-9
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{--https://developers.google.com/maps/documentation/javascript/examples/geocoding-reverse--}}]
@push('scripts')
    <script>
        function initMap() {
            var center = {lat: {{ $event->address->lat }}, lng: {{$event->address->lng}}};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: center
            });

            var geocoder = new google.maps.Geocoder;
            var infowindow = new google.maps.InfoWindow;

            geocodeLatLng(geocoder, map, infowindow, center);
        }

        function geocodeLatLng(geocoder, map, infowindow, latlng) {
            geocoder.geocode({'location': latlng}, function (results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        var marker = new google.maps.Marker({
                            position: latlng,
                            map: map
                        });

                        var bounds = new google.maps.LatLngBounds();
                        bounds.extend(marker.getPosition());
                        map.fitBounds(bounds);
                        map.setZoom(map.getZoom() - 5);

                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_GEOCODER') }}&callback=initMap">
    </script>
@endpush
