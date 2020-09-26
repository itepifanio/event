@extends('layouts.base')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8 offset-md-2">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $userOrganization->name }}</h3>
                        </div>
                        <div class="card-body">

                            <div class="col-md-10 offset-md-1" style="margin-top:16px; margin-bottom: 26px;">
                                <img src="{{ asset('dist/img/photo1.png') }}" width="100%">
                            </div>

                            <p><b>Email</b></p>
                            <p>{{ $userOrganization->email }}</p>

                            <p><b>Description</b></p>
                            <p>{{ $organization->description  }}</p>

                            <p><b>Foundation date</b></p>
                            <p>{{ $organization->foundation_date  }}</p>
                            <div id="map"></div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('organizations.index') }}" class="btn btn-default">Back to list</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection