<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
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
}
