@extends('layout.main')
@section('title', 'History')
@section('container')
<div class="container rounded-lg shadow p-3 bg-primary mt-4">
    <h1 class="text-center">History List</h1>
        <table class="table table-primary table-striped-columns text-center" style="align-items: center; font-family; overflow:auto;">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Total harga</th>
                <th>Status</th>

            </tr>
            <tr>
                <td>1</td>
                <td>Arabica/Robusta</td>
                <td></td>
                <td>Selesai</td>
            </tr>
            {{-- @foreach ($collection as $item)
                
            @endforeach --}}
        </table>
    </div>
@endsection