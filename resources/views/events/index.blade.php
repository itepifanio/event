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
                        @if(Auth::user()->organizations()->count() > 0)
                            <a href="{{ route('events.create') }}"
                               class="btn btn-sm btn-primary float-right">Create</a>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
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
                                        <a href="{{ route('events.show', $event->id) }}"
                                           class="btn btn-xs btn-primary">Show</a>
                                        <a href="{{ route('events.edit', $event->id) }}"
                                           class="btn btn-xs btn-warning">Edit</a>
                                        <form action="{{ route('events.destroy', $event->id) }}" method="post"
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
