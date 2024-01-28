@extends('mainAdmin')

@section('Adminku')
@section ('columns')
<h3>Create Produk</h3>

<hr class="bg-primary">
    <form action="{{ url('/produk/edit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name_kopi" class="form-label">Nama Kopi</label>
            <input type="text" class="form-control @error('nama_kopi') is-invalid @enderror"  id="nama_kopi"placeholder="nama_kopi" required>
        </div>
        @error('nama_kopi')
            <div class="invalid-feedback">{{ $message }}</div>    
        @enderror
        <div class="mb-3">
            <label for="name_kopi" class="form-label">Harga</label>
            <input type="text" class="form-control @error ('harga') is-invalid @enderror"  placeholder="harga" required>
        </div>
        <div class="mb-3">
            <label for="name_kopi" class="form-label">Gambar</label>
            <input type="file" class="form-control @error ('gambar') is-invalid @enderror"  placeholder="Gambar Kopi" required >
            <img src= "assets('assets/gambar')"alt="">
        </div>
        @error('gambar')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <button class="btn btn-primary">Create</button>
            <button class="btn btn-danger"><a href="/produk"></a>Cancel</button>
        </div>
        
    </form>
@endsection
@endsection