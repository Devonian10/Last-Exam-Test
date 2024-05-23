@extends('layout.mainAdmin')

@section('title', 'Order')

@section('Adminku')
@section('columns')

<table class="table table-dark">
    <thead>
        <tr>
            <th colspan="5">Bukti Pembayaran</th>
        </tr>
        <tr>
            <td colspan="5"><img src="{{ asset('gambar/bukti_pembayaran/' . $pesanan[0]->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="400px" height="400px">
        </tr>
        <tr>
            <th>Alamat</th>
        </tr>
        @foreach($pesanan as $index => $item)
        <tr><td colspan="5">{{ $item->Alamat_Pengiriman }}</td>
        </tr>
        @endforeach
        <tr>
            <th>No</th>
            <th>Jenis Kopi</th>
            <th>Harga</th>
            <th>Quantity</th>
            <th>Jumlah Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pesanan as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->product->nama_kopi }}</td>
            <td>Rp. {{ $item->product->harga }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>Rp. {{ $item->product->harga * $item->jumlah }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4">Total</td>
            <td>Rp. {{ $total }}</td>
        </tr>
    </tfoot>
</table>
<a href="{{ route('orderAdmin.indexAdmin') }}" class="btn btn-danger mt-4">Kembali</a>
@endsection
@endsection