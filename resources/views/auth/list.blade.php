@extends('dashboard')
@section('content')

<div class="mt-5">
  
  @if(session()->has('success'))
  <div class="alert alert-success">{{session('success')}}</div>
  @endif
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>
        <a class="btn btn-info" href="{{url('user/'.$item->id)}}">View</a>
        <a class="btn btn-warning" href="{{url('user/'.$item->id.'/edit')}}">Edit</a>
        <form action="{{url('user/'.$item->id)}}" method="post">
          @csrf
          @method("DELETE");
          <button class="btn btn-danger" onclick=" return confirm('Confirm delete?')">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
    {{$users->links()}}
@endsection