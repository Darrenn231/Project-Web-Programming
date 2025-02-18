<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index($id){

        $user = User::find($id);
        return view('editProfile', compact('user'));
    }


    public function update(Request $request, User $user){
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone_number' => 'required|string|size:12',
        'address' => 'required|string',
        'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'password' => 'required|string|min:8',
        ],[
            'name' => 'must be filled',
            'email' => 'email ends with @gmail.com',
            'phone_number' => 'size 12',
            'address' => 'address required',
            'profile_image' => 'image required',
            'password' => 'password required min 8'

        ]);
    
        $data = $request->except('password', 'profile_image');
        $users = auth()->user();
        
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Images'), $imageName);
            $data['profile_image'] = $imageName;
        }
       
        
        if(Hash::check($request->input('password'), $users->password)){
            $user->update($data);
            return redirect('/');
        }
        else{
            return redirect()->back()->withErrors(['password' => 'Incorrect current password']);;
        }
        
    
        
    }
}
