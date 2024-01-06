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
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-center">
                <button type="submit" class="btn btn-primary" ><i class="fa-solid fa-pen"></i> Detail</button>
                <button type="submit" class="btn btn-danger" ><i class="fa-solid fa-xmark"></i> Batal</button>
            </td>
        </tr>
        {{-- @foreach ($collection as $item)
            
        @endforeach --}}
    </table>
</div>

@endsection