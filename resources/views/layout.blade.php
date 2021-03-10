<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="{{ @csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Demo Laravel!</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Product</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.index')}}">User</a>
                </li>

            </ul>
            @if(\Illuminate\Support\Facades\Auth::check())
                <div class="d-flex">
                    <span class="btn rounded mx-3"> Name:
                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </span>
                    @can('admin')
                        <a class="btn btn-outline-danger mx-3" href="{{route('admin')}}">Admin Page</a>
                    @endcan
                    <a class="btn btn-outline-danger" href="{{route('logout')}}">logout</a>
                </div>
            @else
                <form class="d-flex">
                   <a class="btn" href="{{route('login')}}">Login</a>
                   <a class="btn btn-primary" href="{{route('register')}}">Register</a>
                </form>
            @endif
        </div>
    </div>
</nav>
    @yield("content")

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" ></script>

</body>
</html>