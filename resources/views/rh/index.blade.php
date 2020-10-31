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
                        <a href="{{ route('organizations.rh.create', $organization->id) }}"
                           class="btn btn-sm btn-primary float-right">
                            Invite
                        </a>
                    </div>
                    <div class="card-body">

                        @if(count($users) > 0)
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="col-md-4">Name</th>
                                    <th class="col-md-2">Role</th>
                                    <th class="col-md-2">Status</th>
                                    <th class="col-md-4">Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ ucfirst($user->pivot->role) }}</td>
                                        <td>{{ ucfirst($user->pivot->status) }}</td>
                                        <td>
                                            <a href="{{ route('organizations.rh.edit', [$organization->id, $user->id]) }}"
                                               class="btn btn-xs btn-warning">Edit</a>
                                            @if( $user->pivot->status !== \App\Models\User::STATUS_PENDING)
                                                <form method="POST" action="{{ route('organizations.rh.update', [$organization->id, $user->id]) }}" style="display: inline">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="name" value="{{$user->name}}"/>
                                                    <input type="hidden" name="email" value="{{$user->email}}"/>
                                                    <input type="hidden" name="role" value="{{$user->pivot->role}}"/>

                                                    @if( $user->pivot->status === \App\Models\User::STATUS_ACTIVE)
                                                        <input type="hidden" name="status" value="{{\App\Models\User::STATUS_DISABLED}}"/>
                                                        <button class="btn btn-xs btn-danger" type="submit"
                                                            onclick="return confirm('Do you want disable this user?');">
                                                            Disable
                                                        </button>
                                                    @endif

                                                    @if( $user->pivot->status === \App\Models\User::STATUS_DISABLED)
                                                        <input type="hidden" name="status" value="{{\App\Models\User::STATUS_ACTIVE}}"/>
                                                        <button class="btn btn-xs btn-success" type="submit"
                                                            onclick="return confirm('Do you want enable this user?');">
                                                            Enable
                                                        </button>
                                                    @endif

                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            Any users. You're all alone, but you don't need to be: invite some people!
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
