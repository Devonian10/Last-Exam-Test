@extends('layout.main')

@section('title', 'Keranjang list')
    <style>
        .sale-nota {
            display: flex;
            padding-bottom: 3px;
            justify-content: center;
            border-radius: 3em;
            background: ;
        }
        .sale-nota p{
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
            font-family:cursive;
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
    <div class="bg-primary sale-nota">
        <form action="{{ route('resipembayaran.store') }}" method="post">
            @csrf
        <div class="row">
            <div class="col-5 g-4">
                <label for="Alamat Pengiriman" class="form-label labelku">Alamat pengiriman</label>
                <input type="text" class="form-control">
            </div>
            
            <div class="row">
              <div class="col-5 g-4">
                <br>
                
              </div>
            </div>
            {{-- @if ($cartItem->count() > 0) --}}
            <div class="mb-3" >
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
                    {{-- @foreach ($cartItem as $data) --}}
                      <tr>
                        <td>@if (Auth::check())
                          <p style="font-size: 16px;">{{ Auth::user()->username}}</p>
                          @endif</td>
                          <td>
                            <span></span>
                          </td>
                          <td><img src={{ $data->gambar }} ></td>
                          <td>Rp. {{ $data->harga }}</td>
                          <td>{{ $data->Quantity }}</td>
                          <td>Rp. {{ $data->Total_harga }}</td>
                          <td><button class="btn btn-danger"onclick="removeCart"><i class="fa-solid fa-close"></i></button></td>
                        </form>
                        </tr>
                        {{-- @endforeach --}}
                   </tbody>
                </table>
              </div>
              {{-- @endif --}}
        </div>
        <div class="row-50 g-4 mb-4 justify-content-center text-center">
            <a class="btn btn-danger" href="{{ route('shop.index') }}">Kembali</a>
            <form action="{{ route('resipembayaran.store') }}" method="post">
              @csrf
            <button type="submit" class="btn btn-success">Checkout</button>
          </form>
        </div>
        <div class="modal fade" id="modalBukti" tabindex="-1" aria-labelledby="modalBuktiLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="modalBuktiLabel"> Batal Pemesanan </h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <form action="{{ route('resipembayaran.store') }}" method="post">
                      @csrf
                      <label for="formFile" class="form-label">Silahkan upload bukti transfer yang sudah tersedia di no rek xxxx-xxxx-xxxx-xxxx</label>
                      <input class="form-control" type="file" id="formFile"><img>
                    </form>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="reset" class="btn btn-warning" onclick="">Reset</button>
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        
    </body>
@endsection
<script src="{{ asset('js/script2.js') }}">


</script>