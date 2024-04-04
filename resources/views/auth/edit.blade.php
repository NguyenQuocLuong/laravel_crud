@extends('dashboard')
@section('content')
<form action="{{url('user/'.$user->id)}}" method="POST">
  @csrf
  @method("PATCH")
  <input type="hidden" name="id" id="id" value="{{$user->id}}">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name </label>
    <input value="{{$user->name}}" type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input value="{{$user->email}}" type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Phone</label>
    <input value="{{$user->phone}}" type="text" class="form-control" name="phone" id="phone">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Image</label>
    <input value="{{$user->image}}" type="text" class="form-control" name="image" id="image">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection