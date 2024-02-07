<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateRegistrationRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    //
    public function index()
    {
        return view('registration', ["title" => "registration", "active" => 'register']);
        return view('admin.userAdmin', ["title" => "userAdmin", "active" => 'users']);
        
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
        return redirect('/userAdmin')->with('success', 'User Has been Added .');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }
    public function update(Request $request, User $user)
    {
        $rules = [
            "username" => "required|string|max:255|unique:users",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed|string|min:5|max:255",
            "phone_number" => "required|numeric|min:10",
        ];
        if ($request->email != $user->email) {
            $rules['email'] = "required|email|unique:users";
        }
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
    public function destroy(Request $request, $id)
    {
        //
        User::destroy($id);

        if ($request) {
            //return response()->json(['message' => 'User has not found'], 404);
        //return response()->json(['message' => 'User has been deleted']);->route('admin.userAdmin.index')->
        return redirect('/userAdmin')->with('success', 'User has been deleted');
        }
        
    }
}
