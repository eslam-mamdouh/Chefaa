@extends('layout.master')
@section('content')


<form action="{{route('pharmacies.store')}}" method="POST" class="col-6 m-auto">
    @csrf
    <div class="form-group">
        <label class="float-left">Pharamacy Name :</label>
        <input type="text" name="name" required value="{{old('name')}}" class="form-control" placeholder="Type Here...">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label class="float-left">Address :</label>
        <input type="text" name="address" required value="{{old('address')}}" class="form-control" placeholder="Type Here...">
        @error('address')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form> 


@endsection
