@extends('layout.mainAdmin')

@section('title', 'produk')
@section('Adminku')
@section('columns')
<h3><i class="fa-solid fa-store mr-2"></i> Create Produk</h3>

@if ('success')
<div></div>
@endif
<hr class="bg-primary">
<form action="{{ url('/produk/tambah') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name_kopi" class="form-label">Nama Kopi</label>
        <input type="text" class="form-control @error('nama_kopi') is-invalid @enderror" id="nama_kopi" placeholder="nama_kopi">
    </div>
    @error('nama_kopi')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="name_kopi" class="form-label">Harga</label>
        <input type="text" class="form-control @error ('harga')is-invalid @enderror" id="harga" placeholder="harga">
    </div>
    <div class="mb-3">
        <label for="name_kopi" class="form-label">Gambar</label>
        <img alt="">
        <input type="file" class="form-control @error ('gambar') is-invalid @enderror" id="gambar" placeholder="Gambar">

    </div>
    @error('gambar')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="text" class="form-control @error ('stock') is-invalid @enderror" id="stock" placeholder="stock">
    </div>
    @error('stock')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <button class="btn btn-primary" type="submit">Create</button>
        <a class="btn btn-danger" href="{{ url('/produk') }}">Cancel</a>
    </div>

</form>
@endsection
@endsection