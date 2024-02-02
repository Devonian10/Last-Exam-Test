<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Auth;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('layout/mainlogin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = auth()->user();

            return redirect()->intended('/');

        }

        return back()->with('loginError', 'Your username or password is incorrect!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/')->with('logout', 'You have been logged out!');
    }

}
