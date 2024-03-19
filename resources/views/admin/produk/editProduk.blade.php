@extends('layout.mainAdmin')

@section('Adminku')
@section('columns')
<h3>Edit Produk</h3>

<hr class="bg-primary">
    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name_kopi" class="form-label">Nama Kopi</label>
            <input type="text" class="form-control"  id="nama_kopi" name="nama_kopi"placeholder="nama_kopi" value="{{ old('nama_kopi', $produk->nama_kopi) }}" >
        </div>

        <div class="mb-3">
            <label for="name_kopi" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" placeholder="harga" value="{{ old('harga', $produk->harga) }}">
        </div>
        <div class="mb-3">
            <label for="name_kopi" class="form-label">Gambar</label>
            <img class="img-preview img-fluid">
            <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar Kopi" value="{{ old('gambar', $produk->gambar) }}"  onchange="previewImage()">
            <img src= "{{ asset('assets/gambar') }}"alt="">
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock" placeholder="stock" value="{{ old('stock', $produk->stock) }}" >
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Status</label>
            {{-- <input type="text" class="form-control" name="status" id="status" placeholder="status" value="{{ old('status', $produk->status) }}" required> --}}
            <select name="status" class="form-control" id="status">
                <option value="{{ old('status', $produk->status)=='draft' }}" @if( old('status')== 'draft') {{ $produk->status }} @endif>draft</option>
                <option value="{{ old('status', $produk->status)=='public' }}"  @if( old('status')== 'public') {{ $produk->status }} @endif>public</option>
            </select>
        </div>
            <button class="btn btn-primary" type="update">Update</button>
            <a href="{{ route('produk.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </form>
@endsection
@endsection