@extends('layout.main')
@section('title', 'order')

@section('container')

<div class="container rounded-lg shadow p-3 bg-brown mt-4">
  <h1 class="text-center">Order List</h1>
  <table class="table table-dark table-striped-columns text-center" style="align-items: center; overflow:auto;">
    <tr>
      <th>No</th>
      <th>Order</th>
      <th>Jenis Kopi</th>
      <th>Tanggal</th>
      <th>Bukti Pembayaran</th>
      <th>Alamat Pengiriman</th>
      <th>Quantity</th>
      <th>Total Harga</th>
      <th>Status</th>
      <th colspan="3" scope="col">Aksi</th>
    </tr>
    
    @foreach ($pesanan as $index => $item)
    <?php $total += $item->jumlah * $item->product->harga; ?>
    <tr>
      <td>{{ $index + 1 }}</td>
      <td>{{ substr($item->order_id, 0, 5) }}</td>
      <td>{{ $item->product->nama_kopi }}</td>
      <td>{{ $item->updated_at }}</td>
      <td>
        @if($item->bukti_pembayaran)
            <img src="{{ asset('gambar/bukti_pembayaran'. $item->bukti_pembayaran) }}" alt="Bukti Pembayaran" style="max-width: 100px;">
        @else
            <span>Tidak ada bukti pembayaran</span>
        @endif
    </td>
      <td>{{ $item->Alamat_Pengiriman }}</td>
      <td>{{ $item->jumlah}}</td>
      <td>Rp. {{ $total }}</td>
      <td>{{ $item->status }}</td>
      <td class="text-center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $index }}"><i class="fa-solid fa-pen"></i></button>
        </td>
        <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalBatal{{ $index }}"><i class="fa-solid fa-xmark"></i></button>
      </td>
    </tr>
    @endforeach
  </table>
</div>

@foreach ($pesanan as $index => $item)
<!-- Modal Detail -->
<div class="modal fade" id="modalDetail{{ $index }}" tabindex="-1" aria-labelledby="modalDetailLabel{{ $index }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetailLabel{{ $index }}">Detail Pesanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Jenis Kopi: {{ $item->product->nama_kopi }}</p>
        <p>Quantity: {{ $item->jumlah }}</p>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Batal -->
<div class="modal fade" id="modalBatal{{ $index }}" tabindex="-1" aria-labelledby="modalBatalLabel{{ $index }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalBatalLabel{{ $index }}">Konfirmasi Pembatalan Pesanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <strong>Anda yakin ingin membatalkan pesanan ini?</strong>
      </div>
      <div class="modal-footer">
        <form action="{{ route('order.cancel', ['id'=>$item->id]) }}" method="POST">
          @csrf
          {{-- @method('DELETE') --}}
          <button type="submit" class="btn btn-danger">Ya, Batalkan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- Modal End Batal--->

<!-- Modal --->

{{-- <script>
  function myFunction() {
    document.getElementByid("modalBatal").reset();
  }
</script> --}}
@endsection