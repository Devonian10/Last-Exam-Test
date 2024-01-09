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
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo date(DATE_RFC2822)?></td>
                <td></td>
                <td class="text-center"><button class="btn btn-warning" ><i class="fa-solid fa-pen mr-2"><div class="modal"></div></i></button><button class="btn btn-primary"><i class="fa-solid fa-image mr-2"></i></button><button class="btn btn-danger"><i class="fa-solid fa-close"></i></button></td>
            </tr>
        </table>
    </div>
    <div class="modal"></div>
    @endsection
@endsection