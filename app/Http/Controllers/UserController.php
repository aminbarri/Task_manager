<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(){
        return view('user.singup');
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
       
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();


       
       
        return redirect()->route('task')->with('success', 'Account created successfully.');
    }

    public function showlogin(){
        return view('user.login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            
            Auth::user();
      
            return redirect()->intended('/tasks');
        }
       
        else {
            return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        }
        
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login_form');
    }
}
