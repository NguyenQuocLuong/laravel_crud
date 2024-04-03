@extends('layout')
@section('title','Đăng nhập')
@section('content')
<body>
   <div class="wrapper">
      <div class="container">
         <div class="mt-5">
            @if(session()->has('error'))
               <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            @if(session()->has('success'))
               <div class="alert alert-success">{{session('success')}}</div>
            @endif
         </div>
         <div class="row justify-content-around">
            <form action="{{ route('user.authUser') }}" method="post" class="col-md-6 bg-light p-3" enctype="multipart/form-data">
               @csrf
               <h1 class="text-center h3 text-uppercase py-3">Đăng nhập</h1>
               <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="email" name="email" id="email">
                  @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
               </div>
               <div class="form-group">
                  <label for="password">Mật khẩu</label>
                  <input class="form-control" type="password" name="password" id="password">
                  @if ($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
               </div>
               <div class="form-group">             
                  <input type="checkbox" name="remember-me" id="remember-me" class="form-check-input ml-1">
                  <label for="remember-me" class="form-check-label ml-4">Remember me</label>
               </div>
               <input type="submit" value="Đăng nhập" class="btn-primary btn btn-block">
            </form>
         </div>
      </div>
   </div>
</body>
@endsection