<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.userAdmin', compact('users'), ['title' => 'users']);
    }
    public function create(){
        $users = User::all();
        return view('admin.user.createUser', compact('users'));
    }
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        // dd($request->all());
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
            'phone_number' => 'required|string|max:20'
        ]);


        // Buat pengguna baru
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phoneNumber = $request->phone_number;
        $user->password = bcrypt($request->password); // Enkripsi password
        $user->status = 'user';
        $user->save();

        // Redirect atau beri respon sesuai kebutuhan aplikasi Anda
        return redirect('/userAdmin')->with('success', 'Pengguna berhasil dibuat!');
    }
    public function editAdmin(string $id)
    {
        $users = User::findOrFail($id);
        return view('admin.user.editUser', compact('users'));
    }
    public function update(Request $request, string $id)
    {
        $users = User::findOrFail($id);
        $users->update($request->all());
        $users->save();
        return redirect()->route('userAdmin.index')->with('success', 'User Has been Updated.');
    }
    // Profile users
    public function indexProfile()
    {
        $users = User::all();
        return view('profile', compact('users'), ['title' => 'users']);
    }
    public function updateProfile(Request $request, string $id){
        $users = User::findOrFail($id);
        $users->update($request->except(["password"]));
        $users->save();
        return redirect()->route('home')->with('success', 'Your Profile has been update');
    }

    public function editProfile(string $id)
    {
        $users = User::findOrFail($id);
        return view('profile', compact('users'));
    }
}
