<?php 
$date= "";
$month= "";
$year = "";
?>
@extends('layout.mainAdmin')

@section('title', 'Pesanan')
    

@section('Adminku')
    <div class="container rounded-lg shadow p-3 bg-primary mt-4">
        <table class="table table-info">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jenis kopi</th>
                <th>Total harga</th>
                <th>tanggal</th>
                <th>resi</th>
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
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
@endsection