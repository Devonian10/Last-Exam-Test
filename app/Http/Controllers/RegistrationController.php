<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateRegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    //
    public function index()
    {
        return view('registration', ["title"=>"registration","active"=> 'register']);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "username" => "required|string|max:255|unique:users",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed|string|min:5|max:255",
            "phone_number" => "required|numeric|min:10",
        ]);
        
        $user = new User();
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->is_admin = "user";  
        $user->phoneNumber = $validatedData['phone_number'];
        $user->status = "user";
        $user->save();
        
        return redirect('/mainlogin')->with('success', 'Registration has been successfully, please login on website !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateRegistrationRequest $request, Registration $registration)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
