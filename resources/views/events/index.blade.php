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
                        <h3 class="card-title">Events</h3>
                        <a href="{{ route('organizations.events.create', $organization->id) }}"
                           class="btn btn-sm btn-primary float-right">
                            Create
                        </a>
                    </div>
                    <div class="card-body">
                        @if($events->count() > 0)
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $event->date }}</td>
                                        <td>
                                            <a href="{{ route('organizations.events.show', [$organization->id, $event->id]) }}"
                                               class="btn btn-xs btn-primary">Show</a>
                                            <a href="{{ route('organizations.events.edit', [$organization->id, $event->id]) }}"
                                               class="btn btn-xs btn-warning">Edit</a>
                                            <a href="{{ route('organizations.events.attendances.edit', [$organization->id, $event->id]) }}"
                                               class="btn btn-xs btn-success">Manage Attendance</a>
                                            <form action="{{ route('organizations.events.destroy', [$organization->id, $event->id]) }}" method="post"
                                                  style="display: inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-xs btn-danger" type="submit"
                                                        onclick="return confirm('Do you want delete this event');">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            Any event created.
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
