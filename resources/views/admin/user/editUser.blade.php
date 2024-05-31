@extends('layout.mainAdmin')

@section('title', 'produk')

@section('Adminku')
@section('columns')

<h3><i class="fa-solid fa-user-pen mr-2"></i> Edit User</h3>
<hr class="bg-primary">
    <form action="{{ route('users.update', ["id"=> $users->id]) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="name_kopi" class="form-label">Username</label>
            <input type="text" class="form-control @error ('username') is-invalid @enderror" id="username" name="username"placeholder="username" value="{{ old('username', $users->username) }}">
        </div>
        @error('username')
            <div class="invalid-feedback"><span class="text-danger mt-3">{{ $message }}</span></div>    
        @enderror
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error ('email') is-invalid @enderror"  id="email" name="email" placeholder="email" value="{{ old('email', $users->email) }}">
        </div>
        @error('email')
            <div class="invalid-feedback"><span class="text-danger mt-3">{{ $message }}</span></div>    
        @enderror
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error ('password') is-invalid @enderror" name="password" id="password" placeholder="password" value="{{ old('password', $users->password) }}" >
        </div>
        @error('password')
        <div class="invalid-feedback"><span class="text-danger mt-3">{{ $message }}</span></div>
        @enderror
        <div class="mb-3">
            <label for="Phone Number" class="form-label">Phone Number</label>
            <input type="text" class="form-control"  id="phoneNumber" name="phoneNumber" placeholder="Phone Number" value="{{ old('phoneNumber', $users->phoneNumber) }}">
        </div>
        {{-- @error('phone')
        <div class="invalid-feedback"><span class="text-danger mt-3">{{ $message }}</span></div>
        @enderror --}}
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Update</button>
            <a class="btn btn-danger" href="{{ route('userAdmin.index') }}"> Cancel</a>
        </div>
    </form>
 
@endsection
@endsection
<script>


</script>