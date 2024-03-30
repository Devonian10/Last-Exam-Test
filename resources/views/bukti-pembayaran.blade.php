@extends('layout.main')

@section('title', 'Bukti Pembayaran')

@section('container')

<section>
    <div class="row"> 
        <form action="{{ route('upload.payment') }}" method="post" enctype="multipart/form-data">
            @csrf
            @foreach($cartItem as $product)
              <input type="hidden" name="cartItem[]" value="{{ $product->product_id }}">
            @endforeach
            <div class="mb-2">     
                <label for="bukti_pembayaran" class="form-label">Upload bukti</label>
                <input type="file" class="form-control"name="bukti_pembayaran" id="bukti_pembayaran" placeholder="Choose your file">
            </div>
            
            <div class="mb-2">
                <label for="Alamat_pengiriman" class="form-label">Alamat Pengiriman</label>
                <input type="text" class="form-control" name="Alamat_pengiriman" id="Alamat_pengiriman" placeholder="Masukkan alamat pengiriman">
            </div>
            <button type="submit" class="btn btn-primary">Upload dan Kirim</button>
        </form>
    </div>
</section>
<table class="table">
    <tfoot>
         <tr>
            <td>Total</td>
            <td>Rp. {{ $total }}</td>
        </tr>
    </tfoot>
</table>
@endsection