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
                <td>Rp. {{ $order->Total_harga }}</td>
                <td><?php echo date(DATE_RFC2822)?></td>
                <td>{{ $order->status }}</td>
                <td class="text-center">
                    <button class="btn btn-warning" alt="Edit" data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="fa-solid fa-pen mr-2"></i></button>
                    <button class="btn btn-primary" alt="imageModal" data-bs-toggle="modal" data-bs-target="#modalImage"><i class="fa-solid fa-image mr-2"></i></button>
                    <button class="btn btn-danger" alt=""><i class="fa-solid fa-close mr-2"></i></button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- Modal untuk Edit--->
    
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalEditLabel"> Edit Pemesanan </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="">

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!--- End Modal EditKopi ---->
      <div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="modalImageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalImageLabel"> Bukti Pembayaran </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <img src="{{  }}" class="img-fluid rounded float-start" alt="...">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    @endsection
@endsection