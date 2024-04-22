@extends('layout.main')

@section('title', 'Bukti Pembayaran')

@section('container')

<section>
    <div class="row"> 
        <form action="{{ route('upload.payment') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x" role="alert" style="z-index: 1000;">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
                @endif

                @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x" role="alert" style="z-index: 1000;">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
                @endif
            @if(!is_null($errors) && $errors->any())
            <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @foreach($cartItem as $product)
              <input type="hidden" name="cartItem[]" value="{{ $product->product_id }}" required>
            @endforeach
            <div class="mb-2">     
                <label for="bukti_pembayaran" class="form-label">Upload bukti</label>
                <input type="file" class="form-control"name="bukti_pembayaran" id="bukti_pembayaran" placeholder="Choose your file" required>
            </div>
            
            <div class="mb-2">
                <label for="Alamat_pengiriman" class="form-label">Alamat Pengiriman</label>
                <input type="text" class="form-control" name="Alamat_pengiriman" id="Alamat_pengiriman" placeholder="Masukkan alamat pengiriman" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload dan Kirim</button>
        </form>
    </div>
</section>
<table class="table">
    <tfoot>
         <tr>
            <td colspan="2">Total</td>
            <td>Rp. {{ $total }}</td>
        </tr>
        <tr>
            <th colspan="3" scope="col">Payment Method</th>
        </tr>
        <tr>
            <td>Please, make a direct Bank Transfer to one of the accounts below, 
                to complete your payment!
            </td>
            <td rowspan="3" scope="row">MANDIRI - </td>
            <td>BRI - </td>
            <td>BCA - </td>
        </tr>
    </tfoot>
</table>
@endsection