<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;

class CrudUserController extends Controller
{
    public function login()
    {
        return view('login');
    }


    public function authUser(Request $request)
    {


        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        //lay email va password
        $credentials = $request->only('email', 'password');
        //dd(Auth::check($credentials));
        //kiem tra duoi database
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'))
                ->withSuccess('Đăng nhập thành công!!');
        }
        //{{ '$request'}};
        return redirect(route('login'))->withError('Email hoặc mật khẩu không đúng');
    }
    public function getRegister()
    {
        return view("crud_user.register");
    }
    public function postRegister(Request $request)
    {
        $request->validate([
            'fullname' => 'required|max:50',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|min:6',
            'file_upload' => 'required|image',
            'phonenumber' => 'required'

        ]);
        //doi ten file nguoi dung
        if ($request->has('file_upload')) {
            $file = $request->file_upload;
            //$ten_file = $file->getClientoriginalName();
            $ext = $file->extension();
            $ten_file = time() . '-' . 'AvtUser' . '.' . $ext;
            //dd($ext);
            //dd($ten_file);
            $file->move(public_path('uploads'), $ten_file);
            $request->merge(['image' => $ten_file]); //truong cua ten file sau khi ep kieu la image
        }


        //them vao co so du lieu
        $this->create($request->all());
        //return view('crud_user.register');
        return redirect('login')->withSuccess('Bạn có thể đăng nhập!');
    }

    //ham them vao co so du lieu
    public function create(array $data)
    {
        //dd($data);

        return User::create([
            'name' => $data['fullname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $data['image'],
            'phone' => $data['phonenumber'],
        ]);
    }
    //kiem tra da dang nhap chua
    public function checkLogin()
    {
        //dd(Auth::check());
        if (Auth::check()) {
            return view('home');
        }
        return redirect('login')->withError('You are not allowed to access');
    }
    public function logOut()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
