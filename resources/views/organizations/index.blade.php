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
                        <h3 class="card-title">organizations</h3>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($organizations as $organization)
                                <tr>
                                    <td>{{ $organization->name }}</td>
                                    <td>
                                        <a href="{{ route('organizations.show', $organization->id) }}"
                                           class="btn btn-xs btn-primary">Show</a>
                                        <a href="{{ route('organizations.edit', $organization->id) }}"
                                           class="btn btn-xs btn-warning">Edit</a>
                                        <form action="{{ route('organizations.destroy', $organization->id) }}" method="post"
                                              style="display: inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-xs btn-danger" type="submit"
                                                    onclick="return confirm('Do you want delete this organization');">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection