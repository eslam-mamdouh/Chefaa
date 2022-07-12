@extends('layout.master')
@section('content')


<form action="{{route('pharmacies.update' , ['pharmacy'=>$pharmacy->id])}}" method="POST" enctype="multipart/form-data" class="col-6 m-auto">
    @csrf
    @method("put")
    <div class="form-group">
        <label class="float-left">Pharamacy Name :</label>
        <input type="text" name="name" required value="{{$pharmacy->name}}" class="form-control" placeholder="Type Here...">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label class="float-left">Pharamacy :</label>
        <input type="text" name="address" required value="{{$pharmacy->address}}" class="form-control" placeholder="Type Here...">
        @error('address')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
  </form> 


@endsection
