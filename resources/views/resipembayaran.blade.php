@extends('layout.main')

@section('title', 'resi pembayaran')
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
    

<h2 class="text-center">Bukti Pembayaran</h2>
    <div class="bg-primary sale-nota">
        <form action="{{ route('orders') }}" method="post">
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
                <img class="img-preview" alt="Bukti Pembayaran">
                <br>
                <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                <input class="form-control @error ('bukti_pembayaran') is-invalid @enderror" type="file" id="#gambar" >
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
            <a class="btn btn-danger" href="{{ url('/shop') }}">Kembali</a>
            <a href="#" class="btn btn-success" onclick="return confirm('Are you sure Fix add to cart!')">Konfirmasi</a>
        </div>
        </form>
        
    </body>
@endsection