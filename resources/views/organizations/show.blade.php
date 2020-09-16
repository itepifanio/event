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
                            <h3 class="card-title">{{ $organization->name }}</h3>
                        </div>
                        <div class="card-body">
                            <p>Vazio por enquanto</p>
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