@extends('layout.mainAdmin')

@section('title', 'produk')

@section('Adminku')
@section('columns')
    <div class="container rounded-lg shadow p-4 bg-primary mt-4">
        <table class="table table-dark table-striped-columns">
            <tr>
                <th>No</th>
                <th>Nama Produk Kopi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Kopi Arabika</td>
                <td>Rp.170000</td>
                <td>Arabica</td>
                <td></td>
                <td></td>
                <td><button class="btn btn-primary" onclick=""><i class="fa-solid fa-pen"></i></button><button class="btn btn-danger" onclick=""><i class="fa-solid fa-trash"></i></button></td>
        </tr>
                <td>2</td>
                <td>Kopi Robusha</td>
                <td>Rp.110000</td>
                <td>Robusha</td>
                <td></td>
                <td></td>
                <td><button class="btn btn-primary" onclick=""><i class="fa-solid fa-pen"></i></button><button class="btn btn-danger" onclick=""><i class="fa-solid fa-trash"></i></button></td>
        </table>
    </div>
@endsection
@endsection