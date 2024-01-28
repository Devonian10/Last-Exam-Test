@extends('layout.mainAdmin')

@section('title', 'produk')

@section('Adminku')
@section('columns')
<h3>Create User</h3>
<hr class="bg-primary">
    <form action="{{ url('/userAdmin/createUser') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name_kopi" class="form-label">Username</label>
            <input type="text" class="form-control @error ('username') is-invalid @enderror" id="username" placeholder="username" required>
        </div>
        @error('username')
            <div class="invalid-feedback"><span class="text-danger mt-3">{{ $message }}</span></div>    
        @enderror
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error ('email') is-invalid @enderror"  id="email"placeholder="email" required>
        </div>
        <div class="mb-3">
            
        </div>
        @error('gambar')
        <div class="invalid-feedback"><span class="text-danger mt-3">{{ $message }}</span></div>
        @enderror
        <div class="mb-3">
            <button class="btn btn-primary">Create</button>
            <button class="btn btn-danger"><a href="/produk"></a>Cancel</button>
        </div>
        
    </form>




@endsection
@endsection