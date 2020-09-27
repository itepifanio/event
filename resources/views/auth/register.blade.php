@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="organization_section" id="organization_section" name="organization_section" >
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    <textarea type="text"
                                              class="form-control @error('description') is-invalid @enderror"
                                              id="description" name="description"
                                              autocomplete="description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="foundation_date" class="col-md-4 col-form-label text-md-right">{{ __('Foundation Date') }}</label>
                                <div class="col-md-6">
                                    <input type="date"
                                        class="form-control @error('foundation_date') is-invalid @enderror"
                                        id="foundation_date" value="{{ old('foundation_date') }}" name="foundation_date">
                                    @error('foundation_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="col">
                                <div class="input-group-text">
                                    <input class= "mr-1" type="checkbox"  id='is_organization' class="form-control" {{ (bool) old('is_organization') ? 'checked' : '' }} name="is_organization" aria-label="Checkbox for following text input" onChange="isOrganization()">
                                    Register as organization
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        window.onload = function() {
          isOrganization();
        };
        function isOrganization() {
            const is_organization = document.getElementById('is_organization');
            const organization_section = document.getElementById('organization_section');
            const input_description = document.getElementById('description');
            const input_foundation_date = document.getElementById('foundation_date');

            const checked = Boolean(is_organization.checked);

            // Se não estiver marcado cadastro como organização, desabilita os inputs
            input_description.disabled = !checked;
            input_foundation_date.disabled = !checked;

            if(is_organization.checked){
                organization_section.style.height = 'auto';
                organization_section.style.visibility = 'visible';
            }
            else{
                organization_section.style.height = 0;
                organization_section.style.visibility = 'hidden';
            }
        }
    </script>
@endpush
