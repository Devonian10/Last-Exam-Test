@extends('layout.main')
@section('title', 'Registration')
@section('container')

<div class="registration container mt-4" style="background-color: brown">
    <h2 class="judul2 text-center">Registration</h2>
    <div class="row g-3 ">
    <div class="col text-center ">
            <label for="Username">Username</label>
            <input type="text" class="form-control" placeholder="Username" required>
        </div>
        <div class="col">
            <label for="Email">Email</label>
            <input type="text" class="form-control" placeholder="Email" required>
        </div>
    </div>
    <br>
    <div class="row g-3" >
        <div class="col">
            <label for="Password">Password</label>
            <input type="password" class="form-control"name = "password" placeholder="Password">
        </div>
        <div class="col">
            <label for="Confirm Password">Confirm Password</label>
            <input type="password" class="form-control"name ="Repeat Password" placeholder="Password">
        </div>
    </div>
    <div class="text-center mt-5 button-registration">
    <button type="button" class = "btn btn-primary align-items-center justify-content-center  mb-4 mx-5">back</button>
    
    <button type="button" class="btn btn-primary align-items-center justify-content-center mb-4 mx-5" style="text-align: justify;">register</button>
</div>
</div>

@endsection
