@extends('layouts.base')

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropdown.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tag.css') }}">
    
@endpush

@section('content')
    <section class="content">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Invite Users</h3>
                    </div>
                    <div class="card-body">
                        
                        <form action="{{ route('organizations.rh.store', [$organization->id, 1]) }}" method="post"
                                style="display: inline">
                            @csrf

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                <div class="col-md-6">
                                    <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>
                                <div class="col-md-6">
                                    <div class="dropdown">
                                        <input onfocus="toggleDropdown()"  type="text" id="user" onkeyup="filterFunction()">
                                        <div id="usersDropdown" class="dropdown-content">
                                            @foreach($users as $user)
                                                <a onclick="chooseUser({{$user}})">{{$user->name}}</a>
                                            @endforeach
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div id="users-container"></div>
                                </div>
                            </div>
                            
                            
                            <button type="submit" class="btn btn-primary">
                                Invite
                            </button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var choosenUsers = [];
        function toggleDropdown() {
            document.getElementById("usersDropdown").classList.toggle("show");
        }
        function chooseUser(user){
            if(!choosenUsers[user.id]) {
                choosenUsers[user.id] = user;
                document.getElementById('users-container').innerHTML += `<a id="user_${user.id}" class="tag" onclick="removeUser(this.id, ${user.id})">${user.email}<a>`;
            }
        }
        function removeUser(tagid, userid){
            choosenUsers.splice(userid, userid);
            document.getElementById(tagid).remove();
        }
        
        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("user");
            filter = input.value.toUpperCase();
            div = document.getElementById("usersDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
                } else {
                a[i].style.display = "none";
                }
            }
        } 
        
    </script>
@endpush