@extends('layouts.base')

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            @foreach($errors as $error)
                {{ $error }}
            @endforeach
            
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Confirm Invitation</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('invitation.confirm', [$token]) }}" class="{{ $errors->count() > 0 ? 'needs-validation' : '' }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="confirmInvitation"
                                            {{ (bool) old('confirmInvitation') ? 'checked' : '' }}
                                            onChange="toggleConfirm()"
                                            class="custom-control-input" id="confirmInvitation">
                                        <label class="custom-control-label" for="confirmInvitation">Accept Invitation</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Password</label>
                                    <input type="password" id="password_confirmation"
                                           class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                           placeholder="Confirm password" name="password_confirmation" autocomplete="new-password">
                                    @if($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">{{ $errors->get('password_confirmation')[0] }}</div>
                                    @endif
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

@push('scripts')
    
@endpush
