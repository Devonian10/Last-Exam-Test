@extends('layout.main')
@section('title', 'Shopping Cart')
@section("container")

<h2 style=" text-align:center;" class="mt-3">Shopping List</h2>
<div class="container row justify-content-center mt-4" >
@foreach ($Shop as $index => $kopiku)
      <div class="row" style="width:18rem;" >
        <div class="card card border-success h-100">
          <div class="card-header bg-transparent border-success" style="text-align: center;font-size: 20px;" ><strong>{{ $kopiku->nama_kopi }}</strong></div>
          <img src={{ $kopiku->gambar }} alt= ""class="rounded-img">
          <div class="card-body">
            <p class="card-text text-center">Rp.{{ $kopiku->harga }}</p>
            <p class="card-text text-center">
              <button class="btn btn-primary " onclick="totalClick({{$index}}, -1)"><i class="fa-solid fa-minus"></i></button>
              <span class="btn btn-primary" id="totalClicks{{ $index }}" value="0">0</span>
              <button class = "btn btn-primary" onclick="totalClick({{$index}}, 1)"><i class="fa-solid fa-plus"></i></button>
            </p>
            <p class="card-text text-center"onclick=""><button type="button"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $index }}"><i class="fa-solid fa-magnifying-glass mr-2"> </i> Detail</button></p>
            <!-- Modal Detail Button Shop--->
           
            <div class="modal fade" id="modalDetail{{ $index }}" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDetailLabel{{ $index }}" alt="kopi">{{ $kopiku->nama_kopi }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    {{-- <p class="modal-text">Stock in {{ $produk }}</p> --}}
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
    @endforeach
    <div class="text-center mt-4">
      @csrf
      <a type="button"class="btn btn-primary text-lg-center" href="{{ url('/resipembayaran') }}"><i class="fa-solid fa-cart-plus" style="color: #FFFFFF "></i> Tambah keranjang</a>
    </div>
  </div>
<script src="{{ asset('js/script2.js') }}">
//function totalClick(click) {
//const totalClicks =document.getElementById('totalClicks');
//const sumvalue = parseInt(totalClicks.innerText)+click;
//console.log(sumvalue + click);
//totalClicks.innerText = sumvalue;

//if (sumvalue < 0){
//    totalClicks.innerText=0;
//} if (click === 0){
//    totalClicks.innerText=0
//}
//}
</script>
@endsection