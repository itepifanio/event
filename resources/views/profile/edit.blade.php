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
                            <h3 class="card-title">Edit Profile</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('profile.update', ['id' => $user->id]) }}"
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
                                    <input type="email"
                                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                                           placeholder="Email" name="email" value="{{ $user->email }}">
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">{{ $errors->get('email')[0] }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="switchPassword"
                                            {{ (bool) old('switchPassword') ? 'checked' : '' }}
                                            onChange="changePassword()"
                                            class="custom-control-input" id="switchPassword">
                                        <label class="custom-control-label" for="switchPassword">I want to change password</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="old-password">Old Password</label>
                                    <input type="password"
                                           class="form-control {{ $errors->has('old-password') ? 'is-invalid' : '' }}" id="old-password"
                                           placeholder="Old password" name="old-password">
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">{{ $errors->get('password')[0] }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password"
                                           class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password"
                                           placeholder="Password" name="password">
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">{{ $errors->get('password')[0] }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input type="password" id="password-confirm"
                                           class="form-control {{ $errors->has('password-confirm') ? 'is-invalid' : '' }}"
                                           placeholder="Confirm password" name="password_confirmation" autocomplete="new-password">
                                    @if($errors->has('password-confirm'))
                                        <div class="invalid-feedback">{{ $errors->get('password-confirm')[0] }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="/home" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        window.onload = function() {
          changePassword();
        };
        function changePassword() {
            const wantChangePassword = document.getElementById('switchPassword');

            const inputOldPassword = document.getElementById('old-password');
            const inputPassword = document.getElementById('password');
            const inputConfirmPassword = document.getElementById('password-confirm');

            const checked = Boolean(wantChangePassword.checked);

            // Se não estiver marcado alteração de senha, desabilita os inputs
            inputOldPassword.disabled = !checked;
            inputPassword.disabled = !checked;
            inputConfirmPassword.disabled = !checked;
        }
    </script>
@endpush
