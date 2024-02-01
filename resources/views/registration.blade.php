@extends('layout.main')
@section('title', 'Registration')
@section('container')
<div class="registration container mt-4" style="background-color: brown">
    <h2 class="judul2 text-center">Registration</h2>
    @if ('success')
        <div></div>
    @endif
    <form action="{{ route('registration.store') }}" method="post">
        @csrf
    <div class="row g-3">
    <div class="col text-center ">
            <label for="Username" class="form-label">Username</label>
            <input type="text" class="form-control @error ('username') is-invalid @enderror" id="username" placeholder="Username" name="username" required>
        </div>
        @error('username')
            <div id="username" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <div class="col">
            <label for="Email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email"required>
        </div>
        @error('email')
            <div id="email" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <br>
    <div class="row g-3">
        <div class="col">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control @error ('password') is-invalid @enderror "id="password"name = "password" placeholder="Password" required>
        </div>
        @error('password')
            <div id="password" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <div class="col">
            <label for="Confirm Password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control @error ('password') is-invalid @enderror"name ="password_confirmation" id="password" placeholder="password" required>
        </div>
        @error('password')
            <div id="password" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for="Phone number" class="form-label">Phone Number</label>
            <input type="text" class="form-control " name = "phone_number" placeholder="Phone Number" style="width:536.5px">
        </div>
    </div>
        <div class="text-center mt-5 button-registration">
            <a type="submit" class = "btn btn-primary align-items-center justify-content-center  mb-4 mx-5">back</a>
            <button type="submit" class="btn btn-primary align-items-center justify-content-center mb-4 mx-5" style="text-align: justify;">register</button>
        </div>
        <div class="text-center">
        <small style="text-align: center;">Already Login? <a href="/mainlogin">Login</a></small>
    </div>
    </form>
</div>

@endsection




