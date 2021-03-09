@extends('layout')

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {!! Session::get('success') !!}
        </div>
    @elseif (Session::has('errors'))
        <div class="alert alert-danger" role="alert">
            {!! Session::get('errors') !!}
        </div>
    @endif

    <table class="table table-success table-striped">
        <thead>
        <tr>
            <th scope="col">UserName</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Group</th>
            <th scope="col">Permission</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{ $user->name }}</td>
                <td>{{$user->email}}</td>
                <td>
                    <ul>
                    @foreach($user->group as $group)
                        <li>{{$group->name}}</li>
                    @endforeach
                    </ul>
                </td>
                <td>
                        @if(count($user->permission) > 0)
                        <ul>
                            @foreach($user->permission as $permission)
                                <li>{{$permission->name}}</li>
                            @endforeach
                        </ul>
                    @else
                        <span>Empty Permission</span>
                    @endif
                </td>
                <td>
                    @can('show-product', \Illuminate\Support\Facades\Auth::user())
                        <button class="btn btn-primary">
                            <a href="{{route('product.show', $user->id)}}" class="text-white text-decoration-none">Show</a>
                        </button>
                    @endcan

                    @can('edit-product',\Illuminate\Support\Facades\Auth::user())
                        <button class="btn btn-success">
                            <a href="{{route('product.edit', $user->id)}}"class="text-white text-decoration-none">Edit</a>
                        </button>
                    @endcan

                    @can('delete-product',\Illuminate\Support\Facades\Auth::user())
                        <form action="{{route('user.destroy', $user->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @can('add-product',\Illuminate\Support\Facades\Auth::user())
        <button class="btn btn-info rounded-circle text-white font-weight-bold"
                style="position: fixed; bottom: 15px; right:25px;height: 50px; width: 50px; " data-bs-toggle="modal"
                data-bs-target="#adduser">
            <div style="position:relative;">
                <span style="position: absolute; top: -22px; left: 3px; font-size: 26px">+</span>
            </div>
        </button>
    @endcan

    <!-- Modal -->
    <div class="modal fade" id="adduser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form action="{{route('user.store')}}" method="post">
            @csrf
            @method('post')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add new user</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row my-2">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                            <div class="col-md-6">
                                <input type="text" id="username" class="form-control" name="username"
                                       required autofocus>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input type="text" id="name" class="form-control" name="name"
                                       required autofocus>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input type="text" id="email" class="form-control" name="email"
                                       required autofocus>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" name="password"
                                       required>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Re-Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                                       required>
                            </div>
                        </div>


                        <div class="mb-3 form-check">
                            <label for="" class="col-md-4 col-form-label text-md-right">Group for user:</label>
                        @foreach($groups as $group)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="group[]" id="{{ $group->name }}" value="{{$group->id}}">
                                    <label class="form-check-label" for="{{ $group->name }}">{{ $group->name }}</label>
                                </div>
                            @endforeach
                        </div>



                        <div class="mb-3 form-check">
                            <label for="" class="col-md-4 col-form-label text-md-right">Permission for user:</label>
                            <br>
                        @foreach($permissions as $permission)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="permission[]" id="{{ $permission->name }}" value="{{$permission->id}}">
                                    <label class="form-check-label" for="{{ $permission->name }}">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection