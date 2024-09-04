@extends('layout.landing')
@section('title','landing page')
<style>
    /* * {
        padding: 0 !important;
        margin: 0 !important;
        
    } */
    .bg {
        display: inline;
        height: 100vh;
        width: 100vw;
        background-image: url("{{ asset('gambar/20230826_105056.jpg') }}");
        background-size: cover;
        background-position:center; 
        position:fixed;
        z-index: 2;
            /* padding: 0 !important;
            margin: !important;
            */
    
    }
    .black-overlay {
        position: relative;
        height: 100vh;
        width: 100vw;
        background-size: cover;
        background-position:center; 
        position:fixed;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 1;
        backdrop-filter: blur(5px);
        }
    .content-row {
    position: relative; /* Establish context for .content layering */
  }

  .content {
    background-color: rgba(0, 0, 0, 0.5); /* Set semi-transparent dark background */
    padding: 3rem; /* Add some padding for content spacing */
    border-radius: 4px;
    color: white; /* Ensure text color is white for contrast */
  }
    .text-centerku {
        color: white;
        text-align: center;
        text-shadow: 4rem;
    }
    .logo {
        display: flex; 
        justify-content: center; 
        flex-direction: column;
    }
    @media (max-width: 768px){
        .welcome-heading {
            font-size: 24px;
        }
    }
</style>
@section('container')
@section('container')
<div class="container-fluid row bg justify-content-center overflow-auto">
    <!-- Logo ditambahkan di dalam div bg -->
    <div class="black-overlay container-fluid row justify-content-center overflow-auto">
        <div class="container content-row">
            <div class="container rounded-lg shadow " style="border-radius:4px;">
                <h2 class="text-centerku"></h2>
                <div class="row justify-content-center">
                    <div class="col-8 g-4 d-flex justify-content-center align-items-center text-center">
                        <div class="logo">
                        <img src="{{ asset('gambar/299385752_397934109147635_7327667729942218094_n.jpg') }}" class="rounded-img" style="width: 200px; height:200px; display: block; margin: 0 auto;">
                        <p style="color: white;font-family:Arial, Helvetica, sans-serif; font-size:16pt;">
                            Toraja Kawaa Roastery merupakan pelaku usaha mikro dimana Kopi Specialty yang dijual pada kemasan kopi Toraja Kawaa Roastery yaitu Kopi Arabika dan Kopi Robusta.
                        </p>
                        <h2 class="text-center welcome-heading" style="color: white">Selamat Datang di Website Toraja Kawaa Roastery</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
</script>
@endsection