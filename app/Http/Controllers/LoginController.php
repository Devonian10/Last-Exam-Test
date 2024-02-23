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
        return view('login');
        return view('admin/dashboard', ['title' => 'dashboard', 'active' => 'admin']);
    }
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if (auth()->check() && auth()->user()->username === 'admin') {
    //         // return $next($request)->redirect('admin/dashboard')->with('success', 'You logged admin');
    //     }
    //     //User::handle($next);
    //     abort(403, 'Unauthorized action.');

    //     // return redirect('admin')->with('success', 'You logged admin');
    // }
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $user = auth()->user();
            if ($user->username === 'admin') {
                $request->session()->put('admin', true);
                return redirect('/admin');
            }
            return redirect('/');
        }
        // return back('/')->with('error', 'You Username and password is incorrect !');// Redirect ke halaman utama dengan pesan error jika pengguna username dan password salah
        return redirect('/')->withErrors(['error', 'You are not logged in!'])->withInput(); // Redirect ke halaman utama dengan pesan error jika pengguna belum login
    }

    public function logout(Request $request)
    {
        if (Auth::check()) { // Periksa apakah pengguna sudah login
            Auth::logout(); // Logout pengguna
            $request->session()->invalidate(); // Invalidate session
            $request->session()->regenerateToken(); // Regenerate CSRF token
            $request->session()->regenerate(); // Regenerate session ID
            return redirect('/')->with('logout', 'You have been logged out!'); // Redirect ke halaman utama setelah logout
        } else {
            return redirect('/')->with('error', 'You are not logged in!'); // Redirect ke halaman utama dengan pesan error jika pengguna belum login
        }
    }
}
