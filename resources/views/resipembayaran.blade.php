@extends('layout.main')

@section('title', 'Keranjang list')
<style>
  .sale-nota {
    display: flex;
    padding-bottom: 3px;
    justify-content: center;
    border-radius: 3em;
  }

  .sale-nota p {
    font-family: cursive;
    font-size: 15pt;
    display: flex;
  }

  .labelku {
    size: 14rem;
    margin: 4px;
    font-family: cursive;
  }

  body {
    font-family: cursive;
  }

  /* table {
          border:1px solid;
          text-align: center;
          background-color:brown;
          display: flex;
          margin: 50px;
        }
        th, td {
          padding: 15px;
          text-align: center;
        } */
</style>
@section('container')

<body>
  <h2 class="text-center">Cart list</h2>
  @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x" role="alert" style="z-index: 1000;">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
                @endif

                @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x" role="alert" style="z-index: 1000;">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
                @endif
  <div class="bg-primary sale-nota">
    {{-- <form action="{{ route('resipembayaran.store') }}" method="post">
      @csrf --}}
      <div class="row">
        <div class="row">
          <div class="col-5 g-4">
            <br>

          </div>
        </div>
        {{-- @if ($cartItem->count() > 0) --}}
        <div class="mb-3">
          <table class="table">
            <thead>
              <tr>
                <th>Customer Name</th>
                <th>Produk</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Quantity</th>
                <th>Total harga</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($cartItem as $data)
              <tr>
                <td>@if (Auth::check())
                  <p style="font-size: 16px;">{{ Auth::user()->username}}</p>
                  @endif
                </td>
                <td>
                  {{ $data->product->nama_kopi }}
                </td>
                <td><div class="img"><img src="{{ asset($data->product->gambar) }}" style="height:80px; width: 70px; object-fit: cover;"></div></td>
                <td>Rp. {{ $data->product->harga }}</td>
                <td>{{ $data->quantity }}</td>
                <td>Rp. {{ $data->product->harga * $data->quantity }}</td>
    </form>
    <td>
      <form action="{{ route('cart.remove', ['cartItemId'=>$data->id]) }}" method="POST">
        @csrf
        @method('DELETE')<button class="btn btn-danger remove-btn" data-cart-item-id="{{ $data->id }}"><i class="fa-solid fa-close"></i></button></form>
    </td>
    </tr>
    @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td>Total</td>
        <td>Rp. {{ $total }}</td>
      </tr>

    </tfoot>

    </table>
  </div>
  {{-- @endif --}}
  </div>
  <div class="row-50 g-4 mb-4 justify-content-center text-center">
    
      {{-- <button type="submit">Checkout</button> --}}
      <a href="{{ route('bukti-pembayaran.bukti') }}" class="btn btn-success">Checkout</a>
      {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalBukti">Checkout</button> --}}
  </div>
  <div class="modal fade" id="modalBukti" tabindex="-1" aria-labelledby="modalBuktiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalBuktiLabel">Bukti </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <form action="{{ route('upload.payment') }}" method="post" enctype="multipart/form-data">
              @csrf
              <!-- Menambahkan input tersembunyi untuk mengirimkan list produk -->
              @foreach($cartItem as $product)
              <input type="hidden" name="cartItem[]" value="{{ $product->id }}">
              @endforeach

              <label for="formFile" class="form-label">Upload bukti pembayaran</label>
              <input class="form-control" type="file" id="bukti_pembayaran" name="bukti_pembayaran">

              <div class="col-5 g-4">
                <label for="Alamat Pengiriman" class="form-label labelku">Alamat pengiriman</label>
                <input type="text" class="form-control" id="Alamat_pengiriman" name="Alamat_pengiriman">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Kirim</button> <!-- Tambahkan atribut form untuk menentukan formulir mana yang akan di-submit -->
          </div>
        </div>
      </div>
    </div>
    </form>

</body>

@endsection
<script src="{{ asset('js/script2.js') }}">
  function removeCartItem(cartItemId) {
    if (confirm('Anda yakin ingin menghapus item ini dari keranjang?')) {
      // Kirim permintaan penghapusan ke server menggunakan Ajax
      $.ajax({
        url: 'cart/remove/' + cartItemId,
        type: 'DELETE',
        data: {
          _method: 'DELETE'
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        },
        success: function(response) {
          location.reload
        },
        error: function(xhr) {
          console.error('Error', xhr.responseText);
        }
      });
    }
  }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js">
  $(document).ready(function() {
    $('.remove-btn').on('click', function() {
      var cartItemId = $(this).data('cart-item-id');
      if (confirm('Anda yakin ingin menghapus item ini dari keranjang?')) {
        $.ajax({
          url: '/cart/remove/' + cartItemId, // Ganti dengan URL endpoint yang sesuai
          type: 'POST',
          data: {
            _method: 'DELETE'
          },
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
            // Refresh halaman setelah penghapusan berhasil
            location.reload();
          },
          error: function(xhr) {
            console.error('Error:', xhr.responseText);
          }
        });
      }
    });
  });
</script>
<script src="{{ asset('js/script3.js') }}"></script>