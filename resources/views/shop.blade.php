@extends('layout.main')
@section('title', 'Shopping Cart')
@section("container")

<div class="container content-row-mt-4">
  @foreach ($Kopi as $kopiku)
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card border-success h-100 text-center">
          <div class="card-header bg-transparent border-success" style="font-family: 'Times New Roman', Times, serif;text-align: center;font-size: 20px;" ><strong>{{ $kopiku["title"]; }}</strong></div>
          <img src="gambar/{{ $kopiku["gambar"]; }}" alt= "{{ $kopiku["title"]; }}"class="rounded-img">
          <div class="card-body">
            <p class="card-text text-center">Rp.{{ $kopiku["priceHarga"] }}</p>
            <p class="card-text">
              <button class="btn btn-primary" onclick="totalClick(-1)">-</button>
              <span class="btn btn-primary" id="totalClicks">0</span>
              <button class = "btn btn-primary" onclick="totalClick(1)">+</button>
            </p>
            </div>
          </div>
        </div>
    </div>
    @endforeach
    <div>
      <button class="btn btn-primary text-lg-center" onclick="">keranjang</button>
    </div>
  </div>

@endsection