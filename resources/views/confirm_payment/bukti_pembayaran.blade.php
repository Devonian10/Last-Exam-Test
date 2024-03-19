@extends('layout.main')

@section('title', 'bukti pembayaran')
@section('container')
<style>

</style>
<h2 class="text-center">Bukti Pembayaran</h2>
<form action="{{ resipembayaran.store,['Shop'=>$Shop->id] }}" method="post">
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
                <td>0 {{ $Shop->id[0]->stock }}</td>
                <td>Rp. {{ $Shop->id[0]->harga }}</td>
            </tr>
            <tr>
                <td>Robusta</td>
                <td>0 {{ $Shop->id[1]->stock }}</td>
                <td>Rp.{{ $Shop->id[1]->harga }}</td>
            </tr>
            <tr>
                <th>Total</th>
                <th>0 {{ $Shop->count()->stock }}</th>
                <th>Rp. {{ $Shop->count()->harga }}</th>
            </tr>
        </table>
      </div>
</div>
<div class="row-50 g-4 mb-4 justify-content-center text-center">
    <a class="btn btn-danger" href="{{ route('shop.index') }}">Kembali</a>
    <a href="#" class="btn btn-success" onclick="return confirm('Are you sure Fix add to cart!')">Konfirmasi</a>
</div>
</form>

@endsection
<script>
    
</script>