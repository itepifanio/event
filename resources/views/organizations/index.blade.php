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
                        <h3 class="card-title">Organizations</h3>
                        
                    </div>
                    <div class="card-body">

                        @if(count($organizations) > 0)   
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="col-md-8">Name</th>
                                    <th class="col-md-4">Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($organizations as $organization)
                                    <tr>
                                        <td>{{ $organization['name'] }}</td>
                                        <td>
                                            <a href="{{ route('organizations.show', $organization['id']) }}"
                                               class="btn btn-xs btn-primary">Show</a>
                                            <!-- <a href="{{ route('organizations.edit', $organization['id']) }}"
                                               class="btn btn-xs btn-warning">Edit</a> -->
                                            <!-- <a href="{{ route('organizations.events.index', $organization['id']) }}"
                                               class="btn btn-xs btn-default">Manage events</a>
                                            <form action="{{ route('organizations.destroy', $organization['id']) }}"
                                                  method="post"
                                                  style="display: inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-xs btn-danger    " type="submit"
                                                        onclick="return confirm('Do you want delete this organization');">
                                                    Delete
                                                </button>
                                            </form> -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            Any organization created. Create one and start to manage events.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function () {
            $('#datatable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "columnDefs": [
                    {"orderable": false, "targets": 2}
                ]
            });
        });
    </script>
@endpush