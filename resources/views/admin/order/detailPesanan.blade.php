@extends('layout.mainAdmin')

@section('title', 'Order')

@section('Adminku')
@section('columns')

<table class="table table-dark">
    <thead>
        <tr>
            <th> Bukti Pembayaran</th>
        </tr> 
        <tr>
            <td><img src="" alt="Bukti_pembayaran"></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>No</th>
            <th>Jenis Kopi</th>
            <th>Harga</th>
            <th>Quantity</th>
            <th>Jumlah Harga</th>
        </tr>
        {{-- @foreach ($cartItem as $item) --}}
            
       
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        {{-- @endforeach --}}
    </tbody>
    <tfoot>
        <td>Total</td>
        {{-- <td>{{ $total }}</td> --}}
    </tfoot>
</table>

@endsection
@endsection