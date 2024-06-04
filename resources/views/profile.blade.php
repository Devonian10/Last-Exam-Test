@extends('layout.main')

@section('title', 'Profil')

@section('container')
    <h2 class="text-center">Profile</h2>
    <div class="row mt-3 bg-brown" style="border-radius:20px;">
        <form action="{{ route('updateProfile', ["id"=> $users->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-auto mb-2">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="{{ old('username', $users->username) }}">
                </div>
            </div>
            <div class="row g-3">
                <div class="col-auto">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                </div>
            </div>
            <div class="row g-3">
                <div class="col-auto">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email', $users->email) }}">
                </div>
            </div>
            <div class="row g-3">
                <div class="col-auto">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" placeholder="Phone Number" id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber', $users->phoneNumber) }}">
                </div>
            </div>
            <div class="text-center">
                <a type="button" class="btn btn-danger mt-4" href="{{ route('home') }}">Kembali</a>
                <button type="submit" class="btn btn-success mt-4">Simpan</button>
            </div>
        </form>
    </div>
@endsection
