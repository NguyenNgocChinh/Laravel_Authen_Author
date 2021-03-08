@extends('layout')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

@section('content')

    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            <form action="{{route('login')}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">Email or Username</label>
                                    <div class="col-md-6">
                                        <input type="text" id="username" class="form-control" name="username"
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
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                    <a href="#" class="btn btn-link">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>


@endsection