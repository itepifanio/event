@extends('layouts.base')

@push('stylesheets')
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 50vh;
            margin-bottom: 10px;
            display: none;
        }
        /*!* Optional: Makes the sample page fill the window. *!*/
        /*html, body {*/
            /*height: 100%;*/
            /*margin: 0;*/
            /*padding: 0;*/
        /*}*/
        #floating-panel {
            position: absolute;
            top: 10px;
            left: 25%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }
    </style>
@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if($errors->has(['address_name', 'lat', 'lng']))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="color: white">
                    Please choose a valid address.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <!-- left column -->
                <div class="col-md-8 offset-md-2">
                    <!-- general form elements -->
                    <div class="card">
                        @if(Auth::user()->organizations()->count() > 0)
                            <div class="card-header">
                                <h3 class="card-title">Create event</h3>
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ route('events.store') }}" class="{{ $errors->count() > 0 ? 'needs-validation' : '' }}">
                            @csrf

                            <input type="hidden" id="lat" name="lat">
                            <input type="hidden" id="lng" name="lng">
                            <input type="hidden" id="address_name" name="address_name">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" placeholder="Name" name="name">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->get('name')[0] }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description">
                                    </textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">{{ $errors->get('description')[0] }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" id="start_date" name="start_date">
                                    @if($errors->has('start_date'))
                                        <div class="invalid-feedback">{{ $errors->get('start_date')[0] }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}" id="end_date" name="end_date">
                                    @if($errors->has('end_date'))
                                        <div class="invalid-feedback">{{ $errors->get('end_date')[0] }}</div>
                                    @endif
                                </div>
                                <div id="floating-panel">
                                    <input id="address" type="textbox">
                                    <input id="submit" type="button" value="Search">
                                </div>
                                <div id="map"></div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


{{--https://developers.google.com/maps/documentation/javascript/geocoding--}}
@push('scripts')
    <script>
        function initMap() {
            let mapId = document.getElementById('map');
            mapId.style.display = "absolute";
            var map = new google.maps.Map(mapId, {
                zoom: 8,
                center: {lat: -34.397, lng: 150.644}
            });
            var geocoder = new google.maps.Geocoder();

            document.getElementById('submit').addEventListener('click', function() {
                geocodeAddress(geocoder, map);
            });
        }

        function geocodeAddress(geocoder, resultsMap) {
            var address = document.getElementById('address').value;
            geocoder.geocode({'address': address}, function(results, status) {
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