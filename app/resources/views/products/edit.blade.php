@extends('layout.master')
@section('content')


<form action="{{route('products.update' , ['product'=>$product->id])}}" method="POST" enctype="multipart/form-data" class="col-6 m-auto">
    @csrf
    @method("put")
    <div class="form-group">
        <label class="float-left">Product Name :</label>
        <input type="text" name="title" required value="{{$product->title}}" class="form-control" placeholder="Type Here...">
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label class="float-left">Description :</label>
        <textarea name="description" required class="form-control" cols="30" rows="4">{{$product->description}}</textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mt-2">
        <input type="file" name="image" >
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
  </form> 


@endsection
