@extends('layout.master')
@section('content')

<a class="btn btn-info mb-3" href="{{route('products.create')}}">Add Product</a>
<table class="table table-hover" style="table-layout: fixed;">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Lowest Price</th>
        <th>Quantity</th>
        <th>Image</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

     @foreach ($products as $product)
         
        <tr>
            <td>{{$product->title}}</td>
            <td width="100px" style="width:120px !important;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{$product->description}}</td>
            <td>
                @if ($product->lowest_price)
                    {{$product->lowest_price}}
                @else
                    <span class="badge badge-danger">Product Not Exists in any Pharamacy</span>
                @endif

            </td>
            <td>{{$product->quantity}}</td>
            <td><img src="{{$product->image}}" width="50px" height="50px" alt="chefaa-image"></td>
            <td>
                <a class="btn btn-warning float-end mb-2" target="_blank" href="/api/products/{{$product->id}}">Run Show API</a>
                <a class="btn btn-primary float-end" href="{{route('products.edit' , ['product'=>$product->id])}}">Edit</a>
                <form method="POST" action="{{route('products.destroy' , ['product'=>$product->id])}}" style="display: inline;">
                    @csrf
                    @method("delete")
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach   
    </tbody>
  </table>
  <div class="alert text-center">
        {{$products->links()}}
  </div>
@endsection