@extends('layouts.base')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit user</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('organizations.rh.update', [$organization->id, $user->id]) }}"
                              class="{{ $errors->count() > 0 ? 'needs-validation' : '' }}">
                            @method('PUT')
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                                           placeholder="Name" name="name" value="{{ $user->name }}">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->get('name')[0] }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="name"
                                           placeholder="Name" name="email" value="{{ $user->email }}">
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">{{ $errors->get('email')[0] }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="custom-select"  autocomplete="off" name="role">
                                        @foreach(\App\Models\User::ROLES as $role)
                                            @if($role != 'owner')
                                                <option value="{{ $role }}" {{ $user->organizations->first()->pivot->role === $role ? 'selected' : '' }}>{{ $role }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('role')
                                        <div class="invalid-feedback" style="display: unset">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('organizations.rh.index', $organization->id) }}" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
