@extends('layout.main')
@section('title', 'order')

@section('container')

<div class="container rounded-lg shadow p-3 bg-primary mt-4">
  <h1 class="text-center">Order List</h1>
  <table class="table table-dark table-striped-columns text-center" style="align-items: center; overflow:auto;">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>jenis kopi</th>
      <th>Tanggal</th>
      <th>Bukti Pembayaran</th>
      <th>Alamat Pengiriman</th>
      <th>Quantity</th>
      <th>Total harga</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
    
    @foreach ($pesanan as $order)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $order->user->username }}</td>
      <td>{{ $order->product->nama_kopi }}</td>
      <td><?php echo date(DATE_RFC2822) ?></td>
      <td><img src={{ $order->bukti_pembayaran }} alt="Bukti Pembayaran"></td>
      <td>{{ $order->Alamat_pengiriman }}</td>
      <td></td>
      <td>Rp. {{ $order->Total_harga }}</td>
      <td>{{ $order->status }}</td>
      <td class="text-center">
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen"></i> Detail</button>
        <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalBatal"><i class="fa-solid fa-xmark"></i> Batal</button>
</div>
</td>
</tr>
@endforeach
{{-- @foreach ($collection as $item)
            
        @endforeach --}}
<!-- Modal Batal --->
<div class="modal fade" id="modalBatal" tabindex="-1" aria-labelledby="modalBatalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalBatalLabel"> Batal Pemesanan </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/') }}" id ="modalBatal"method="post">
          @csrf
          <label for="Alasan_Cancel">Alasan Cancel</label>
          <input type="text" class="form-control @error ('Alasan_Cancel') is-invalid @enderror" id="Alasan_cancel" name="Alasan_cancel" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="reset" class="btn btn-warning" value="Reset"></input>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal End Batal--->

<!-- Modal --->

{{-- <script>
  function myFunction() {
    document.getElementByid("modalBatal").reset();
  }
</script> --}}
@endsection