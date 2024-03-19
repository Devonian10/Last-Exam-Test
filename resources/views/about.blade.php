@extends('layout.main')
@section('title', 'About Us')

@section('container')
<body style="background-color: #6F4E37;">
    <h1 class="text-center">About us</h1>
    <main>
      <div class="col mb-2">
        <div id="carouselPhotoFade" class="carousel slide carousel-fade text-center" style="width: 100%; ">
          <div class="carousel-inner">
            <div class="carousel-item active" style="width:100%; height:100%;">
              <img src="{{ asset('gambar/20230826_105056.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('gambar/20230826_111142.jpg') }}" class="d-block w-100"  alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('gambar/20230826_115807.jpg') }}" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselPhotoFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselPhotoFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </main>
          <div class="embed-responsive embed-responsive-21by9 text-center mt-4 pt-2 pb-2">
          {{-- <div class="google-maps justify-content-center">
             --}}
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.6888614709956!2d119.44043057388109!3d-5.15367925208073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee3057a2c4145%3A0xc7620862e5a67abe!2sKawaa%20Coffee%20Roasters!5e0!3m2!1sid!2sid!4v1697776811391!5m2!1sid!2sid"
              allowfullscreen=""
              loading="lazy"
              width="1000"
              height="600"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          {{-- </div> --}}
          
          </div>
          <div class="row mt-4 row-cols-1 row-cols-md-3 g-4">
            <div class="col">
            <div class="card border-primary ml-2 text-center" style="width: 18rem">
              
              <div class="card-header pt-4 pb-4" style="font-weight: bold;font-size:16pt;">Facebook</div>
              <div class="card-body">
                <i class="fa-brands fa-facebook fa-2xl mb-2"style="color:#0045bd;"></i>
               <p class="card-text mt-2 pt-2">Toraja kawaa roastery</p>
                <a href="https://web.facebook.com/kawaaroastery/?locale=tl_PH&_rdc=1&_rdr" class="btn btn-primary">Go Link</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card border-danger ml-2 text-center" style="width: 18rem">
              
              <div class="card-header pt-4 pb-4" style="font-weight: bold;font-size:16pt;">Instagram</div>
              <div class="card-body">
                <i class="fa-brands fa-instagram fa-2xl mb-2"style="color:#f09433;"></i>
               <p class="card-text mt-2 pt-2">Toraja kawaa roastery</p>
                <a href="#" class="btn btn-primary">Go Link</a>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
      @endsection