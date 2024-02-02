<?php 

$date= "";
$month= "";
$year = "";
?>
@extends('layout.mainAdmin')

@section('title', 'Pesanan')
    

@section('Adminku')
@section('columns')
<h3><i class="fa-solid fa-address-card mr-2"></i> Orders</h3>
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
                    <button class="btn btn-danger" alt="DeleteModal" data-bs-toggle="modal" data-bs-target="#modalDelete"><i class="fa-solid fa-close mr-2"></i></button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- Modal untuk EditOrder--->
    
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalEditLabel"> Edit Pemesanan </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="get">

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!--- End Modal EditKopi Order---->

      <!-- Start Modal Bukti Pembayaran OrderKopi--->
      <div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="modalImageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalImageLabel"> Bukti Pembayaran </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <img class="img-fluid rounded float-start" alt="...">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!-- --->
      <!-- Start Modal DeleteOrder --->
      <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalDeleteLabel"> User batal Pemesanan </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              @csrf
              <form action="{{ "" }}" method="get">
              <label for="Alasan Cancel">Alasan Cancel</label>
              <input type="text" class="form-control @error ('Alasan_Cancel') is-invalid @enderror ">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
              
            </div>
          </div>
        </div>
      </div>
    @endsection
@endsection