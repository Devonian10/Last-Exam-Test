<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Closure;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin/dashboard', ['title' => 'dashboard', 'active' => 'admin']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin === 'admin') {
            return $next($request)->redirect('admin/dashboard')->with('success', 'You logged admin');
        }
        //User::handle($next);
        abort(403, 'Unauthorized action.');

        return redirect('admin')->with('success', 'You logged admin');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
