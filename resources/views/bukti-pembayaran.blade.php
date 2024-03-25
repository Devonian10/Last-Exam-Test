@extends('layout.main')

@section('title', 'Bukti Pembayaran')

@section('container')

<section>
    <div class="row">
        <div class="mb-2">
            <form action="{{ route }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="form-control">Upload bukti</label>
                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" placeholder="Choose your file">
            </form>
        </div>

        
    </div>
</section>
@endsection