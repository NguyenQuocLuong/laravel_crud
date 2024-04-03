@extends('layout')
@section('title','Trang chủ')
@section('content')
<body>
    <div class="mt-5">
        @if(session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        @if(session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>
    @auth
        {{'xin chao ' . auth()->user()->name}}
    @endauth
</body>
@endsection
