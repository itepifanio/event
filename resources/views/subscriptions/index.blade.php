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
                        <h3 class="card-title">Subscribed to event</h3>
                        
                    </div>

                    <div class="card-body">
                        @if($subscriptions->count() > 0)
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscriptions as $subscription)
                                    <tr>
                                        <td>{{ $subscription->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            Any user subscribed.
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('organizations.events.show', [$organization->id, $event->id]) }}" class="btn btn-default">Back to list</a>
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