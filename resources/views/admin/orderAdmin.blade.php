@extends('layout.mainAdmin')

@section('title', 'Pesanan')
@section('Adminku')
@section('columns')

<h3><i class="fa-solid fa-address-card mr-2"></i> Orders</h3>
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif
<div class="container rounded-lg shadow p-3 bg-brown mt-4">
  <table class="table table-info text-center">
    <tr>
      <th>No.</th>
      <th>Order id</th>
      <th>Nama</th>
      <th>Jenis kopi</th>
      <th>Total harga</th>
      <th>tanggal</th>
      <th>Bukti Pembayaran</th>
      <th>Status</th>
      <th>aksi</th>
    </tr>

    @foreach($pesanan as $order)
    {{-- @dd($order) --}}
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $order->order_id }}</td>
      <td>{{ $order->user->username}}</td>
      <td>{{ $order->product->nama_kopi }}</td>
      <td>Rp. {{ $order->product->Total_harga }}</td>
      <td>{{ $order->created_at->toDateString() }}</td>
      <td><img src="gambar/bukti_pembayaran/{{ $order->bukti_pembayaran }}" alt="Bukti Pembayaran" width="100px" height="100px"></td>
      <td>{{ $order->status }}</td>
      <td class="text-center">
        <a class="btn btn-warning" href="{{ route('orderAdmin.update', ["id"=> $order->id]) }}"><i class="fa-solid fa-pen mr-2"></i></a>
        <a class="btn btn-primary" href="{{ route('orderAdmin.Detail',["id"=>$order->id]) }}"><i class="fa-solid fa-eye mr-2"></i></a>
        <form action="{{ route('orderAdmin.destroy', ["id"=>$order->id]) }}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure delete this Order?')"><i class="fa-solid fa-trash"></i></button>
        </form>
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
          <label for="Alasan Cancel" class="form-control mt-2 g-4">Alasan Cancel</label>
          <textarea name="" id="" cols="30" rows="10"></textarea>
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