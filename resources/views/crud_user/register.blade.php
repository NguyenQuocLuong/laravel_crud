@extends('layout')
@section('title','Đăng kí')
@section('content')
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
                <form action="{{ route('postRegister') }}" method="post" class="col-md-6 bg-light p-3" enctype="multipart/form-data">
                    @csrf
                    <h1 class="text-center h3 text-uppercase py-3">Đăng kí tài khoản</h1>
                    <div class="form-group">
                        <label for="fullname">Họ tên</label>
                        <input class="form-control" type="text" name="fullname" id="fullname">
                        @if ($errors->has('fullname'))
                            <span class="text-danger">{{ $errors->first('fullname') }}</span>
                        @endif
                    </div>
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
                        <label for="">Số điện thoại</label>
                        <input class="form-control" type="text" name="phonenumber" id="phonenumber">
                        @if ($errors->has('phonenumber'))
                            <span class="text-danger">{{ $errors->first('phonenumber') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh</label>
                        <input class="form-control-file" type="file" name="file_upload" id="file_upload" multiple    >
                        @if ($errors->has('file_upload'))
                            <span class="text-danger">{{ $errors->first('file_upload') }}</span>
                        @endif
                    </div>
                    <input type="submit" value="Đăng kí" class="btn-primary btn btn-block">

                </form>
            </div>
        </div>
    </div>
@endsection
