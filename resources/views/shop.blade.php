@extends('layout.main')
@section('title', 'Shopping Cart')
@section("container")

<h2 style="font-family: cursive; text-align:center;" class="mt-3">Shopping List</h2>
<div class="container row justify-content-center mt-4" >
  @foreach ($Kopi as $kopiku)
      <div class="row" style="width:18rem;" >
        <div class="card card border-success h-100">
          <div class="card-header bg-transparent border-success" style="font-family: 'Times New Roman', Times, serif;text-align: center;font-size: 20px;" ><strong>{{ $kopiku["title"]; }}</strong></div>
          <img src="gambar/{{ $kopiku["gambar"]; }}" alt= "{{ $kopiku["title"]; }}"class="rounded-img">
          <div class="card-body">
            <p class="card-text text-center">Rp.{{ $kopiku["priceHarga"] }}</p>
            <p class="card-text text-center">
              <button class="btn btn-primary" onclick="totalClick(-1)"><i class="fa-solid fa-minus"></i></button>
              <span class="btn btn-primary" id="totalClicks">0</span>
              <button class = "btn btn-primary" onclick="totalClick(1)"><i class="fa-solid fa-plus"></i></button>
            </p>
            <p class="card-text text-center"onclick=""><button class="btn btn-primary"></button><i class="fa-solid fa-magnifying-glass"> Detail</i></p>
          </div>
            </div>
        </div>
    @endforeach
    <div class="text-center mt-4">
      <button class="btn btn-primary text-lg-center" onclick=><i class="fa-solid fa-cart-plus" style="color: #FFFFFF "></i> Tambah keranjang</button>
    </div>
  </div>

@endsection