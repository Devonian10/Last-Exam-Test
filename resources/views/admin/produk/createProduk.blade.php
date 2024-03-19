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
        <label for="nama_kopi" class="form-label">Nama Kopi</label>
        <input type="text" class="form-control " name="nama_kopi" id="nama_kopi" placeholder="nama_kopi" required>
    </div>
    @error('nama_kopi')
    <p class="text-danger" >
        {{ $message }}
      </p>
    @enderror
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control " name="harga" id="harga" placeholder="harga" required>
    </div>
    @error('harga')
    <p class="text-danger" >
        {{ $message }}
      </p>
    @enderror
    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <img class="img-preview img-fluid">
        <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Gambar" onchange="" required>
    </div>
    @error('gambar')
    <p class="text-danger" >
        {{ $message }}
      </p>
    @enderror
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control " name="stock" id="stock" placeholder="stock" required>
    </div>
    @error('stock')
    <p class="text-danger" >
        {{ $message }}
      </p>
    @enderror
    <div class="mb-3">
        <label for="stock" class="form-label">Status</label>
        {{-- <input type="text" class="form-control" name="status" id="status" placeholder="status" required> --}}
        <select name="status" class="form-control" id="status">
            <option value="draft" @if( old('status')== 'draft') {{ $produk->status }} @endif>draft</option>
            <option value="public"  @if( old('status')== 'public') {{ $produk->status }} @endif>public</option>
        </select>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary" type="submit" name="action" value="create">Create</button>
        <a class="btn btn-danger" href="{{ route('produk.index') }}">Cancel</a>
    </div>
</form>

@endsection
@endsection