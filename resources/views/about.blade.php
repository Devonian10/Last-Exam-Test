@extends('layout.main')
@section('container')
    <h1>Toraja Kawaa Roastery</h1>
    <div class="beranda">Welcome Toraja Kawaa roastery</div>
      <div class="col">
        <ul class="">
          <li><a href="#instagram"><img src="gambar/{{ $gambar_instagram }}" alt="">instagram</a></li>
          <li><a href="#facebook">Facebook</a></li>
          <li><a href="#whatsapp"><img src="gambar/{{ $gambar_whatsapp }}" alt="">Whatsapp</a></li>
        </ul> 
        <div class="google-maps">
          <div class="text-bg-danger">location</div>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.6888614709956!2d119.44043057388109!3d-5.15367925208073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee3057a2c4145%3A0xc7620862e5a67abe!2sKawaa%20Coffee%20Roasters!5e0!3m2!1sid!2sid!4v1697776811391!5m2!1sid!2sid"
            width="200"
            height="300"
            style="border: 4"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        
        </div>
    </div>
    
      @endsection