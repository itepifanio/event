@extends('layouts.base')

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    <section class="content">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Invite User</h3>
                    </div>
                    <div class="card-body">
                        <p>{{$user->name}}</p>
                        <form action="{{ route('organizations.rh.store', [$organization->id, $user->id]) }}" method="post"
                                                  style="display: inline">
                            @csrf
                            <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus>
                            <button class="btn btn-xs btn-primary" type="submit">
                                Invite
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


