@extends('dash')
@section('content')
@include('shop.partials.head')

<div class=" container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class=" mb-5">Product Page </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}" >Create 
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   

    <table  class="table table-bordered table-responsive-lg">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Manage</th>
          </tr>
        </thead>
        <tbody> 
            @foreach ($products as $product )   
            <tr class=" p-5">
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td><img src="{{ asset($product->image) }}" class=" p-2" width="130" height="100" alt=""></td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->category->name }}</td>
                <td class=" justify-content-center">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
              </tr>
              @endforeach
        </tbody>
      </table>







</div>

@include('shop.partials.scripts')
@endsection