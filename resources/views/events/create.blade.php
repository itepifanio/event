@extends('layouts.base')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8 offset-md-2">
                    <!-- general form elements -->
                    <div class="card">
                        @if(Auth::user()->organizations()->count() > 0)
                            <div class="card-header">
                                <h3 class="card-title">Create event</h3>
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ route('events.store') }}" class="{{ $errors->count() > 0 ? 'needs-validation' : '' }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" placeholder="Name" name="name">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->get('name')[0] }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description">
                                    </textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">{{ $errors->get('description')[0] }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" id="start_date" name="start_date">
                                    @if($errors->has('start_date'))
                                        <div class="invalid-feedback">{{ $errors->get('start_date')[0] }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}" id="end_date" name="end_date">
                                    @if($errors->has('end_date'))
                                        <div class="invalid-feedback">{{ $errors->get('end_date')[0] }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
