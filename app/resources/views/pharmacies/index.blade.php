@extends('layout.master')
@section('content')

<a class="btn btn-info mb-3" href="{{route('pharmacies.create')}}">Add Pharamacy</a>
<table class="table table-hover" style="table-layout: fixed;">
    <thead>
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

     @foreach ($pharmacies as $pharmacy)
         
        <tr>
            <td>{{$pharmacy->name}}</td>
            <td>{{$pharmacy->address}}</td>
            <td>
                <a class="btn btn-primary float-end" href="{{route('pharmacies.edit' , ['pharmacy'=>$pharmacy->id])}}">Edit</a>
                <form method="POST" action="{{route('pharmacies.destroy' , ['pharmacy'=>$pharmacy->id])}}" style="display: inline;">
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
        {{$pharmacies->links()}}
  </div>
@endsection