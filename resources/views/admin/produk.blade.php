@extends('layout.mainAdmin')

@section('title', 'produk')

@section('Adminku')
@section('columns')
<h3>Produk</h3>
<button class="btn btn-primary mb-4" onclick=""><i class="fa-solid fa-plus mr-2"></i> Tambah</button>
    <div class="container rounded-lg shadow p-4 bg-primary mt-4">
        <table class="table table-dark table-striped-columns text-center">
            
            <tr>
                <th>No</th>
                <th>Nama Produk Kopi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            @foreach($produk as $barang)
            <tr>
                <td>{{ $barang->id }}</td>
                <td>{{ $barang->nama_kopi }}</td>
                <td>Rp. {{ $barang->harga }}</td>
                <td><img src={{ $barang->gambar }} alt="" width="100px" height="100px"></td>
                <td>{{ $barang->stock }}</td>
                <td>{{ $barang->status }}</td>
                <td><button class="btn btn-primary" onclick=""><i class="fa-solid fa-pen mr-2"></i></button>
                    <button class="btn btn-danger" onclick=""><i class="fa-solid fa-trash mr-2"></i></button></td>
        </tr>
        @endforeach
            </table>
    </div>
@endsection
@endsection