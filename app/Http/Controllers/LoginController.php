<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Closure;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
//use Auth;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = 'admin';

    public function index()
    {
        return view('layout/mainlogin');
        return view('admin/dashboard', ['title' => 'dashboard', 'active' => 'admin']);
    }
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->username === 'admin') {
            return $next($request)->redirect('admin/dashboard')->with('success', 'You logged admin');
        }
        //User::handle($next);
        abort(403, 'Unauthorized action.');

        return redirect('admin')->with('success', 'You logged admin');
    }
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = auth()->user();

            // TODO: remove after middleware added
            if ($user->username == 'admin') {
                return redirect()->intended('/admin');
            }
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Your username or password is incorrect!');
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            $user = auth()->user();

            return redirect()->intended('/admin');
        }
        //if (Auth::attempt($))

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/')->with('logout', 'You have been logged out!');
    }
}
