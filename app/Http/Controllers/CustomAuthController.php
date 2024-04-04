<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

//Unknow
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            'image' => 'required'
        ]);

        $data = $request->all();
        $this->create($data);

        return redirect("login")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'image' => $data['image']
        ]);
    }
    public function show($id){
        $user = User::find($id);
        return view('auth/detail' )->with('user' ,$user);
    }
    public function edit($id){
        $user = User::find($id);
        return view('auth/edit')->with('user' , $user);
    }
    public function update(Request $request , $id){
        $user = User::find($id);
        $input = $request->all();
        $user->update($input);
        return redirect('list')->with('flash_message', 'student Updated');
    }
    public function delete($id){
        User::destroy($id);
        return redirect('list');
    }
    public function list()
    {
        if(Auth::check()){
            $users = User::paginate(3);
            return view('auth.list')->with('users', $users);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}