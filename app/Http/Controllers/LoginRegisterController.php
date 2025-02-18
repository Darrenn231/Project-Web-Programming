<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;

class LoginRegisterController extends Controller
{
    public function log(){
        return view('Login');
    }

    public function reg(){
        return view('Register');
    }


    public function Login(Request $request){
        $request->validate([
            'email' => 'required|ends_with:@gmail.com',
            'password' => 'required|min:5|max:255',

        ], [
            'email.required' => 'Email must me filled',
            'password.required'=>'password must be filled',
        ]);

        $info = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        

        if(Auth::attempt($info)){
            return redirect('/');
        }
        else{
            return redirect('login')->withErrors('not valid');
        }

    }
    public function logout(){
        Auth::logout();
        return redirect('/guest');
    }

    public function create(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:users|max:255',
        'name' => 'required|string|max:255',
        'password' => 'required|string|min:8',
        'Cpassword' => 'required|string|min:8',
    ],[
        'email.required' => 'Email must me filled',
        'name.required' => 'name must me filled',
        'password.required'=>'password must be filled',
    ]);
    
    if($request->input('password') === $request->input('Cpassword')){
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 'user';
        $user->save();

        return redirect('/login');
    }
    else{
        return redirect('/register');
    }
    
}
}
