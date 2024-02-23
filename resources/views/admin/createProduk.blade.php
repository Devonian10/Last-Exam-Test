@extends('layout.mainAdmin')

@section('title', 'produk')
@section('Adminku')
@section('columns')
<h3><i class="fa-solid fa-store mr-2"></i> Create Produk</h3>

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
<hr class="bg-primary">

<form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name_kopi" class="form-label">Nama Kopi</label>
        <input type="text" class="form-control" name="nama_kopi" id="nama_kopi" placeholder="nama_kopi" required>
    </div>
    <div class="mb-3">
        <label for="name_kopi" class="form-label">Harga</label>
        <input type="number" class="form-control " name="harga"id="harga" placeholder="harga" required>
    </div>
    <div class="mb-3">
        <label for="name_kopi" class="form-label">Gambar</label>
        <img alt="">
        <input type="file" class="form-control" id="gambar" placeholder="Gambar" required>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="text" class="form-control" name="stock" id="stock" placeholder="stock" required>
    </div>
    

    <div class="mb-3">
        <button class="btn btn-primary" type="submit" value="create">Create</button>
        <a class="btn btn-danger" href="{{ url('/produk') }}">Cancel</a>
    </div>

</form>

@endsection
@endsection