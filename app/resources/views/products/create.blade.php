@extends('layout.master')
@section('content')


<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" class="col-6 m-auto">
    @csrf
    <div class="form-group">
        <label class="float-left">Product Name :</label>
        <input type="text" name="title" required value="{{old('title')}}" class="form-control" placeholder="Type Here...">
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label class="float-left">Description :</label>
        <textarea name="description" required class="form-control" cols="30" rows="4">{{old('description')}}</textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mt-2">
        <input type="file" required name="image" >
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form> 


@endsection
