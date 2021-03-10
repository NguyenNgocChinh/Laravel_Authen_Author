@extends('layout')

@section('content')

    <table class="table table-success table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {!! Session::get('success') !!}
            </div>
        @elseif (Session::has('errors'))
            <div class="alert alert-danger" role="alert">
                {!! Session::get('errors') !!}
            </div>
        @endif
        @foreach($product as $prod)
            <tr>
                <th scope="row">{{$prod->id}}</th>
                <td>{{ $prod->name }}</td>
                <td>{{$prod->price}}</td>
                <td>
                    @can('show-product', \Illuminate\Support\Facades\Auth::user())
                        <button class="btn btn-primary">
                            <a href="{{route('product.show', $prod->id)}}" class="text-white text-decoration-none">Show</a>
                        </button>
                    @endcan

                    @can('edit-product',\Illuminate\Support\Facades\Auth::user())
                        <button class="btn btn-success">
                            <a href="{{route('product.edit', $prod->id)}}"class="text-white text-decoration-none">Edit</a>
                        </button>
                    @endcan

                    @can('delete-product',\Illuminate\Support\Facades\Auth::user())
                        <form action="{{route('product.destroy', $prod->id)}}" method="post" style="display: inline-block">
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
                data-bs-target="#addproduct">
            <div style="position:relative;">
                <span style="position: absolute; top: -22px; left: 3px; font-size: 26px">+</span>
            </div>
        </button>
    @endcan

    <!-- Modal -->
    <div class="modal fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form action="{{ route('product.store')  }}" method="post">
            @csrf
            @method('post')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add new product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Oppo A12" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" placeholder="120000" name="price">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" class="form-control" name="description"></textarea>
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