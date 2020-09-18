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
                                           placeholder="Name" name="name" value="{{ $userOrganization->name }}">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->get('name')[0] }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email"
                                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                                           placeholder="Name" name="email" value="{{ $userOrganization->email }}">
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">{{ $errors->get('email')[0] }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea type="text"
                                                  class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                                  id="description" name="description" >
                                                  {{ $organization->description }}
                                        </textarea>
                                        @if($errors->has('description'))
                                            <div class="invalid-feedback">{{ $errors->get('description')[0] }}</div>
                                        @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="foundation_date">Foundation Date</label>
                                    <input type="date"
                                           class="form-control {{ $errors->has('foundation_date') ? 'is-invalid' : '' }}"
                                           id="foundation_date" name="foundation_date" value="{{ $organization->foundation_date }}">
                                    @if($errors->has('foundation_date'))
                                        <div class="invalid-feedback">{{ $errors->get('foundation_date')[0] }}</div>
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


