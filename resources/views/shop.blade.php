@extends('layout.main')
<title>{{ $title; }}</title>
@section("container")

<div class="container content-row">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card border-success h-100 text-center">
          <div class="card-header bg-transparent border-success" style="font-family: 'Times New Roman', Times, serif;text-align: center;font-size: 20px;" ><strong>Robusha</strong></div>
          <img src="gambar/{{ $robusta="" }}" alt="Arabica" class="rounded-img">
          <div class="card-body">
            <p class="card-text text-center">Rp.170000/kg</p>
            <p class="card-text">
              <button class="btn btn-primary" onclick="totalClick(-1)">-</button>
              <span class="btn btn-primary" id="totalClicks">0</span>
              <button class = "btn btn-primary" onclick="totalClick(1)">+</button>
            </p>
            </div>
          </div>
        </div>
        <div class="card border-success h-100 text-center">
          <div class="card-header bg-transparent border-success" style="font-family: 'Times New Roman', Times, serif;text-align: center;font-size: 20px;" ><strong>Arabica</strong></div>
          <img src="gambar/{{ $arabica=["gambar"] }}" alt="Robusta" class="rounded-img">
          <div class="card-body">
            <p class="card-text text-center">Rp.110000/kg</p>
            <p class="card-text">
              <button class="btn btn-primary" onclick="totalClick(-1)">-</button>
              <span class="btn btn-primary" id="totalClicks2">0</span>
              <button class = "btn btn-primary" onclick="totalClick(1)">+</button>
            </p>
            </div>
          </div>
      </div>
    </div>
    <div>
      <button class="btn btn-primary text-lg-center" onclick="">keranjang</button>
    </div>
  </div>

@endsection