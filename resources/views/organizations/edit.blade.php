@extends('layouts.base')

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
                            <h3 class="card-title">Edit organization</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('organizations.update', $organization->id) }}"
                              class="{{ $errors->count() > 0 ? 'needs-validation' : '' }}">
                            @method('PUT')
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                                           placeholder="Name" name="name" value="{{ $organization->name }}">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->get('name')[0] }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('organizations.index') }}" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


