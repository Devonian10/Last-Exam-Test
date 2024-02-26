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
    // public function index1(){
    //     return view('about', ["name" => "Toraja Kawaa Roastery", "description" =>
    //     "Toraja Kawaa roastery adalah salah satu kopi yang nikmat dan ", "location" =>
    //     "Toraja Kawaa Roastery", "phoneNumber" => 4456732123, "gambar_instagram" => "Ellipse 9.jpg", "gambar_whatsapp" => "WhatsApp 1.jpg"]);
    // }
}
