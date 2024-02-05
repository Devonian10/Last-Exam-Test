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
            font-family: monospace;
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
        <form action="resipembayaran.php" method="post">
            @csrf
            
            <div class="row">
            <div class="col-5 g-4">
            <label for="Dipesan Oleh" class="form-label labelku">Dipesan oleh</label>
            <input type="text" class="form-control" value="">
        </div>
            <div class="col-5 g-4">
            <label for="Alamat Pengiriman" class="form-label labelku">Alamat pengiriman</label>
            <input type="text" class="form-control">
        </div>
            <div class="col-5 g-4">
            <label for="metode pembayaran" class="form-label">Metode Pembayaran</label>
            <select name="Metode" id="metode">
                <option selected>Pilih metode pembayaran...</option>
                
                <option value="Manual">Manual</option>
                
            </select>
            <input type="text" required>
            </div>
        </div>
        <div class="row-50 g-4 mb-4 justify-content-center text-center">
            <a class="btn btn-danger" href="{{ url('/shop') }}">Kembali</a>
            <a href="#" class="btn btn-success">Konfirmasi</a>
        </div>
        </form>
        
    </body>
@endsection