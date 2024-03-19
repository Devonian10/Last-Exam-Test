@extends('layout.mainAdmin')

@section('title', 'produk')

@section('Adminku')
@section('columns')
<h3><i class="fa-solid fa-user-plus mr-2"></i> Create User</h3>
<hr class="bg-primary">
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control @error ('username') is-invalid @enderror" name="username" id="username" placeholder="Username">
        @error('username')
        <div class="invalid-feedback"><span class="text-danger mt-3">{{ $message }}</span></div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error ('email') is-invalid @enderror" name="email" id="email" placeholder="Email">
        @error('email')
        <div class="invalid-feedback"><span class="text-danger mt-3">{{ $message }}</span></div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error ('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
        @error('password')
        <div class="invalid-feedback"><span class="text-danger mt-3">{{ $message }}</span></div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" class="form-control @error ('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
        @error('password')
        <div class="invalid-feedback"><span class="text-danger mt-3">{{ $message }}</span></div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="phone_number" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number">
        @error('phone_number')
            <div class="invalid-feedback"><span class="text-danger mt-3">{{ $message }}</span>
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <button class="btn btn-primary" type="submit">Create</button>
        <a class="btn btn-danger" href="{{ url('/userAdmin') }}">Cancel</a>
    </div>
</form>




@endsection
@endsection