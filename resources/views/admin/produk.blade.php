@extends('layout.mainAdmin')

@section('title', 'produk')

@section('Adminku')
@section('columns')
<h3><i class="fa-solid fa-store mr-2"></i> Produk</h3>
<hr>
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif
<a href="{{ route('produk.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus mr-2"></i> Create Product</a>
<div class="container rounded-lg shadow p-4 bg-primary mt-4">
    <table class="table table-dark table-striped-columns text-center">

        <tr>
            <th>No</th>
            <th>Nama Produk Kopi</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Stock</th>
            <th>Status</th>
            <th colspan="3" scope="col">Aksi</th>
        </tr>
        @foreach($produk as $barang)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $barang->nama_kopi }}</td>
            <td>Rp. {{ $barang->harga }}</td>
            <td><img src="{{ asset($barang->gambar) }}" alt="" width="100px" height="100px"></td>
            <td>{{ $barang->stock }}</td>
            <td>{{ $barang->status }}</td>
            <td><a class="btn btn-warning" href="{{ route('produk.update', ['id' => $barang->id]) }}" alt="Edit Kopi" type="button"><i class="fa-solid fa-pen mr-2"></i></a>
                </td>
            <td><form action="{{ route('produk.destroy', $barang->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure Delete produk')" alt="Delete Kopi"><i class="fa-solid fa-trash mr-2"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <!-- Modal Delete Kopi --->



    @endsection
    @endsection