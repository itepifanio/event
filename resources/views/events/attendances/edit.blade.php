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
                        <h3 class="card-title">Manage Attendance</h3>
                    </div>
                    <div class="card-body">
                        @if($users->count() > 0)
                            <form
                                action="{{ route('organizations.events.attendances.update', [$organization->id, $event->id]) }}"
                                method="POST">
                                @method('PUT')
                                @csrf
                                @foreach($users as $index => $user)
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="name">User Name</label>
                                            <input type="text"
                                                   class="form-control"
                                                   value="{{ $user->name }}" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="name">User Email</label>
                                            <input type="text"
                                                   class="form-control"
                                                   value="{{ $user->email }}" readonly>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="name">Attendance</label>
                                            <input class="form-control" type="text" name="{{ $index }}[percentage]"
                                                   value="{{ optional($user->attendances)->first()->percentage ?? 0 }}"/>
                                            @error('*.percentage') <span class="text-xs text-red"> {{ $message }}</span> @enderror
                                            <input class="form-control" type="hidden" name="{{ $index }}[user_id]"
                                                   value="{{ $user->id }}"/>
                                            @error('*.user_id') <span class="text-xs text-red"> {{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row">
                                    <button class="btn-primary form-control w-auto mr-2" type="submit"> Register</button>
                                    <a class="btn-default form-control w-auto"
                                       href="{{ route('organizations.events.index', [$organization->id, $event->id]) }}">
                                        Cancel</a>
                                </div>
                            </form>
                        @else
                            Any user register on this event.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
