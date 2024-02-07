@extends('layout.mainAdmin')

@section('title', 'produk')

@section('Adminku')
@section('columns')

<h3><i class="fa-solid fa-user-plus mr-2"></i> Edit User</h3>
<hr class="bg-primary">
    <form action="{{ url('/userAdmin/editUser') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name_kopi" class="form-label">Username</label>
            <input type="text" class="form-control @error ('username') is-invalid @enderror" id="username" placeholder="username">
        </div>
        @error('username')
            <div class="invalid-feedback"><span class="text-danger mt-3">{{ $message }}</span></div>    
        @enderror
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error ('email') is-invalid @enderror"  id="email"placeholder="email">
        </div>
        @error('email')
            <div class="invalid-feedback"><span class="text-danger mt-3">{{ $message }}</span></div>    
        @enderror
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error ('password') is-invalid @enderror"  id="password" placeholder="password" >
        </div>
        @error('password')
        <div class="invalid-feedback"><span class="text-danger mt-3">{{ $message }}</span></div>
        @enderror
        <div class="mb-3">
            <label for="Phone Number" class="form-label">Phone Number</label>
            <input type="text" class="form-control"  id="Phone Number" placeholder="Phone Number">
        </div>
        {{-- @error('phone')
        <div class="invalid-feedback"><span class="text-danger mt-3">{{ $message }}</span></div>
        @enderror --}}
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Save</button>
            <a class="btn btn-danger" href="{{ url('/userAdmin') }}"> Cancel</a>
        </div>
@endsection
@endsection