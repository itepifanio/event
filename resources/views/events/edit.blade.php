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
            @foreach($errors as $error)
                {{ $error }}
            @endforeach
            @if($errors->has(['address_name', 'lat', 'lng']))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="color: white">
                    Please choose a valid address.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit event</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('organizations.events.update', [$organization->id, $event->id]) }}"
                              class="{{ $errors->count() > 0 ? 'needs-validation' : '' }}">
                            @method('PUT')
                            @csrf

                            <input type="hidden" id="lat" name="lat" value="{{ $event->address->lat }}">
                            <input type="hidden" id="lng" name="lng" value="{{ $event->address->lng }}">
                            <input type="hidden" id="address_name" name="address_name" value="{{ $event->address->name }}">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                                           placeholder="Name" name="name" value="{{ $event->name }}">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->get('name')[0] }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text"
                                              class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                              id="description" name="description">{{ $event->description }}</textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">{{ $errors->get('description')[0] }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date"
                                           class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                                           id="start_date" name="start_date" value="{{ $event->start_date }}">
                                    @if($errors->has('start_date'))
                                        <div class="invalid-feedback">{{ $errors->get('start_date')[0] }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date"
                                           class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}"
                                           id="end_date" name="end_date" value="{{ $event->end_date }}">
                                    @if($errors->has('end_date'))
                                        <div class="invalid-feedback">{{ $errors->get('end_date')[0] }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <div class="input-group">
                                        <input id="address" type="textbox" class="form-control"
                                               value="{{ $event->address->name }}">
                                        <span class="input-group-append">
                                        <input id="submit" type="button" class="btn btn-default" value="Search">
                                    </span>
                                    </div>

                                    <div id="map"></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('organizations.events.index', $organization->id) }}" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
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

            document.getElementById('submit').addEventListener('click', function () {
                geocodeAddress(geocoder, map);
            });
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

        function geocodeAddress(geocoder, resultsMap) {
            var address = document.getElementById('address').value;
            geocoder.geocode({'address': address}, function (results, status) {
                console.log(results);
                if (status === 'OK') {
                    resultsMap.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location
                    });
                    console.log(results[0].formatted_address);
                    document.getElementById('address_name').setAttribute('value', results[0].formatted_address);
                    document.getElementById('lat').setAttribute('value', results[0].geometry.location.lat());
                    document.getElementById('lng').setAttribute('value', results[0].geometry.location.lng());

                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_GEOCODER') }}&callback=initMap">
    </script>
@endpush
