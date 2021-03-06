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
                    
                    <form id="invite_users" action="{{ route('organizations.rh.store', [$organization->id]) }}" method="post"
                                style="display: inline" onsubmit="addChoosenUsers()">
                            @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="role" class="col-md-1 col-form-label text-md-right">{{ __('Role') }}</label>
                                <div class="col-md-11">
                                    <select class="custom-select"  autocomplete="off" name="role">
                                        @foreach(\App\Models\User::ROLES as $role)
                                            @if($role != 'owner')
                                                <option value="{{ $role }}">{{ $role }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('role')
                                        <div class="invalid-feedback" style="display: unset">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                                       
                            <div class="form-group row">
                                <label for="user" class="col-md-1 col-form-label text-md-right">{{ __('User') }}</label>
                                <div class="col-md-11">
                                    <div class="dropdown">
                                        <input onfocus="toggleDropdown()" class="form-control" type="text" id="user" onkeyup="filterFunction()">
                                        <div id="usersDropdown" class="dropdown-content">
                                            @foreach($users as $user)
                                                <a onclick="chooseUser({{$user}})">{{$user->name}}</a>
                                            @endforeach
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <input type="hidden" name="status" value="{{\App\Models\User::STATUS_PENDING}}"/>
                            
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div id="users-container"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"> Invite </button>
                            <a href="{{ route('organizations.rh.index', $organization->id) }}" class="btn btn-default">Cancel</a>
                        </div>
                        
                    </form>
                        
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
                document.getElementById('users-container').innerHTML += `<a id="user_${user.id}" class="tag" onclick="removeUser(this.id, ${user.id})">${user.email} <i class="fa fa-minus-circle"></i></a>`;
            }
        }
        function removeUser(tagid, userid){
            choosenUsers[userid] = null;
            document.getElementById(tagid).remove();
        }
        function addChoosenUsers(){
            choosenUsers.forEach(function(user){
                if(user){
                    let input = document.createElement("input");
                    input.type = "hidden";
                    input.name = "users[]";
                    input.value = user.id;

                    let form = document.getElementById("invite_users");
                    form.appendChild(input);
                }
            });
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