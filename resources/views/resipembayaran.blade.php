@extends('layout.main')

@section('title', 'Keranjang list')
    <style>
        .sale-nota {
            display: flex;
            padding-bottom: 3px;
            justify-content: center;
            border-radius: 3em;
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
    </style>
@section('container')
<body>
    

<h2 class="text-center">Cart list</h2>
    <div class="bg-primary sale-nota">
        <form action="{{ route('resipembayaran.store') }}" method="post">
            @csrf
        <div class="row">
            <div class="col-5 g-4">
                <label for="Dipesan Oleh" class="form-label labelku">Dipesan oleh</label>
                <br>
                @if (Auth::check())
                <p class="form-control">{{ Auth::user()->username}}</p>
                @endif
            </div>
            <div class="col-5 g-4">
                <label for="Alamat Pengiriman" class="form-label labelku">Alamat pengiriman</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-5 g-4">
                <label for="metode pembayaran" class="form-label">Metode Pembayaran</label>
                <br>
                <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalBukti"><i class="fa-solid fa-image"></i> Gambar</button>
            </div>
            <div class="mb-3">
                <table class="table table-dark table-striped">
                    <tr>
                        <th>Kopi</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                    <tr>
                        <td>Arabica</td>
                        <td>0</td>
                        <td>Rp. </td>
                    </tr>
                    <tr>
                        <td>Robusta</td>
                        <td>0</td>
                        <td>Rp.</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <th>0</th>
                        <th>Rp. </th>
                    </tr>
                </table>
              </div>
        </div>
        <div class="row-50 g-4 mb-4 justify-content-center text-center">
            <a class="btn btn-danger" href="{{ route('shop.index') }}">Kembali</a>
            <a href="#" class="btn btn-success" onclick="return confirm('Are you sure Fix add to cart!')">Konfirmasi</a>
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