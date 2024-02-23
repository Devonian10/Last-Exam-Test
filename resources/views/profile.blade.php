@extends('layout.main')

@section('title', 'Profil')

@section('container')
<h2 class="text-center">Profile</h2>
    <div class="row mt-3" style="background-color: #CC8E8E; border-radius:20px;">
        <form action="" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-auto mb-2">
                        <label for="Username" class="form-label">Username</label>
                        <input type="text" class="form-control " id="username" placeholder="Username" name="username" value="{{ old('username') }}">
                        
                </div>
            </div>
            <div class="row g-3">
                <div class="col-auto">
                        <label for="Email" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
            </div>
            <div class="row g-3">
                <div class="col-auto">
                    <label for="Email" class="form-label">Email</label>
                    <input type="text" class="form-control" placeholder="Email" id="email" name="email">
            </div>
        </div>
            <div class="row g-3">
                <div class="col-auto">
                    <label for="Phone Number">Phone Number</label>
                    <input type="text" class="form-control" placeholder="Phone Number" id="phoneNumber" name="phoneNumber">
                </div>
            </div>
        </div>
        <div class="text-center">
        <a type="button" class="btn btn-danger mt-4 flex justify-conent-start" href="{{ url('/') }}">Kembali</a>
        <button type="submit" class="btn btn-success mt-4 flex justify-content-end" >Simpan</button>
    </div>
        </form>
    </div>
@endsection