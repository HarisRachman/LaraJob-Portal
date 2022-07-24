<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function indexRegister()
    {
        return view('auth.register');
    }

    public function prosesRegister(Request $request)
    {
        //validate Inputs
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password'
        ]);

        $user = new User();
        $user->role_id = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $save = $user->save();

        if($save) {
            return redirect()->route('login')->with('success', 'You are now registered successfully');
        }else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register');
        }
    }

    public function indexLogin()
    {
        return view('auth.login');
    }

    public function prosesLogin(Request $request)
    {
        //validate Inputs
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists on users table'
        ]);

        $creds = $request->only('email', 'password');
        if(Auth::attempt($creds)){
            return redirect()->route('home');
        }else{
            return redirect()->route('login')->with('fail', 'Incorrect credentials');
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
