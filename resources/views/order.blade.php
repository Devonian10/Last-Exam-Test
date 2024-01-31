@extends('layout.main')
@section('title', 'order')

@section('container')
<div class="container rounded-lg shadow p-3 bg-primary mt-4">
<h1 class="text-center">Order List</h1>
    <table class="table table-dark table-striped-columns text-center" style="align-items: center; font-family; overflow:auto;">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>jenis kopi</th>
            <th>Tanggal</th>
            <th>Total harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach ($pesanan as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->username }}</td>
            <td>{{ $order->product->nama_kopi }}</td>
            <td><?php echo date(DATE_RFC2822)?></td>
            <td>Rp. {{ $order->Total_harga }}</td>
            <td>{{ $order->status }}</td>
            <td class="text-center">
                <button type="submit" class="btn btn-warning" ><i class="fa-solid fa-image"></i> gambar</button>
                <button type="submit" class="btn btn-primary" ><i class="fa-solid fa-pen"></i> Detail</button>
                <button type="submit" class="btn btn-danger" ><i class="fa-solid fa-xmark"></i> Batal</button>
            </div>
            </td>
        </tr>
        @endforeach
        {{-- @foreach ($collection as $item)
            
        @endforeach --}}
    </table>
</div>

@endsection