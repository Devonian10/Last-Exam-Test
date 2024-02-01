@extends('layout.mainAdmin')

@section('title', 'produk')

@section('Adminku')
@section('columns')
<h3><i class="fa-solid fa-store mr-2"></i> Produk</h3>
<a href="{{ url('produk/tambah') }}" class="btn btn-primary" ><i class="fa-solid fa-plus mr-2"></i> Create Product</a>
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
                <td><button class="btn btn-primary" onclick="" alt="Edit Kopi" data-bs-toggle="modal" data-bs-target="modalEditKopi"><i class="fa-solid fa-pen mr-2"></i></button>
                    <button class="btn btn-danger" onclick="" alt="Delete Kopi" data-bs-toggle="modal" data-bs-target="modalDeleteKopi"><i class="fa-solid fa-trash mr-2"></i></button></td>
            </tr>
        @endforeach
        </table>
        <!-- Modal Delete Kopi --->
        
    

@endsection
@endsection