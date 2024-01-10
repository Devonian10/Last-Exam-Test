<?php 

$date= "";
$month= "";
$year = "";
?>
@extends('layout.mainAdmin')

@section('title', 'Pesanan')
    

@section('Adminku')
@section('columns')
<h3>Orders</h3>
<button class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</button>
    <div class="container rounded-lg shadow p-3 bg-primary mt-4">
        <table class="table table-info text-center">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jenis kopi</th>
                <th>Total harga</th>
                <th>tanggal</th>
                <th>Status</th>
                <th>aksi</th>
            </tr>
            @foreach($pesanan as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->username}}</td>
                <td>{{ $order->product->nama_kopi }}</td>
                <td>{{ $order->Total_harga }}</td>
                <td><?php echo date(DATE_RFC2822)?></td>
                <td>{{ $order->status }}</td>
                <td class="text-center"><button class="btn btn-warning" ><i class="fa-solid fa-pen mr-2"><div class="modal"></div></i></button><button class="btn btn-primary"><i class="fa-solid fa-image mr-2"></i></button><button class="btn btn-danger"><i class="fa-solid fa-close mr-2"></i></button></td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="modal"></div>
    @endsection
@endsection