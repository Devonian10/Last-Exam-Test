@extends('layout.landing')

@section('title', 'Shop')

@section('container')
<h2 style=" text-align:center;" class="mt-3">Shopping List</h2>
<div class="container row justify-content-center mt-4">
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif
@if ($errors->any())
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif
@if(Auth::check())
    <form action="{{ route('order.coffee') }}" method="POST">
        @csrf
        <input type="hidden" name="coffee_id" value="{{ $shopId }}">
        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
    </form>
@else
    <a href="{{ route('login') }}" class="btn btn-warning">Login untuk Pesan</a>
@endif
@if (Auth::check())
    <form action="{{ route('order.index') }}" method="POST">
      @csrf
      <input type="hidden" name = 'productId' value="{{ $kopiku }}">
      <button type="submit" class="btn btn-primary"></button>
@foreach ($Shop as $index => $kopiku)
<div class="row" style="width:18rem;">
    <div class="card card border-success h-100 text-center">
    <div class="card-header bg-transparent border-success" style="text-align: center;font-size: 20px;"><strong>{{ $kopiku->nama_kopi }}</strong></div>
    <img src="{{ $kopiku->gambar }}" alt="" class="rounded-img">
    <div class="card-body">
        <p class="card-text text-center">Rp.{{ $kopiku->harga }}</p>
        <p class="card-text text-center ">
          <button class="btn btn-primary" onclick="totalClick({{$index}}, -1 , {{ $kopiku->stock }})"><i class="fa-solid fa-minus"></i></button>
          <span class="btn btn-primary" id="totalClicks{{ $index }}" value="0">0</span>
          <button class="btn btn-primary" onclick="totalClick({{$index}}, 1, {{ $kopiku->stock }})"><i class="fa-solid fa-plus"></i></button>
        </p>
        <p class="card-text text-center">
        <form action="{{ route('order.show') }}" method="POST">
          @csrf
          <input type="hidden" name="productId" value="{{ $kopiku->id }}">
          <input type="hidden" name="quantity" id="quantity{{$index}}" value="0"> <!-- Hidden input for quantity -->
          <button type="" class="btn btn-primary text-lg-center" id="addToCartBtn{{$index}}" disabled>
            <i class="fa-solid fa-cart-plus" style="color: #FFFFFF "></i> Pesan sekarang
          </button>
        </form>
   @endif
        </p>
        <p class="card-text text-center" onclick="">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $index }}">
            <i class="fa-solid fa-magnifying-glass mr-2"></i> Detail
          </button>
        </p>

        <!-- Modal Detail Button Shop--->
        <div class="modal fade" id="modalDetail{{ $index }}" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalDetailLabel{{ $index }}" alt="kopi">{{ $kopiku->nama_kopi }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p class="modal-text">Stock {{ $kopiku->stock }}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Detail Button Shop--->
      </div>
    </div>
</div>
<!---Modal Pemesanan Untuk mengarah Login / sign up--->
<div class="modal fade" id="modalLogin{{ $Login }}" tabindex="-1" aria-labelledby="modalLogin" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalLogin">Alert</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Silahkan Login atau Registrasi Terlebih dahulu untuk proses pemesanan lebih lanjut
      </div>
      <div class="modal-footer">
        <a href="{{ route('registration.authenticate') }}" class="btn btn-success" data-bs-dismiss="modal">Login</a>
        <a href="{{ route('registration.store') }}" class="btn btn-warning" data-bs-dismiss="modal">Sign Up</a>
      </div>
    </div>
  </div>
</div>
@endforeach


</div>
@endsection