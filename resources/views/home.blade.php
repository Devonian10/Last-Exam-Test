@extends("layout.main")
@section('title', 'Home')
<style>
    /* * {
        padding: 0 !important;
        margin: 0 !important;
        
    } */
    .bg {
        display: inline;
        height: 100%;
        width: 100%;
        background-image: url("{{ asset('gambar/20230826_105056.jpg') }}");
        background-size: cover;
        background-position:center; 
        position:fixed;
        z-index: 2;
        padding: 0 !important;
        margin: !important;
        
        
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
<div class="container-fluid row bg justify-content-center opacity-75 overflow-auto">
    <!-- Logo ditambahkan di dalam div bg -->
    <div class="container content-row p-4">
        <div class="container rounded-lg shadow p-4" style="border-radius:4px;">
            <h2 class="text-centerku"></h2>
            <div class="row justify-content-center">
                <div class="col-8 g-4 d-flex justify-content-center align-items-center text-center">
                    <div class="logo">
                    <img src="{{ asset('gambar/299385752_397934109147635_7327667729942218094_n.jpg') }}" class="rounded-img" style="width: 200px; height:200px; display: block; margin: 0 auto;">
                    <p style="color: white;font-family:Arial, Helvetica, sans-serif;">
                        Toraja Kawaa Roastery merupakan pelaku usaha mikro dimana Kopi Specialty yang dijual pada kemasan kopi Toraja Kawaa Roastery yaitu Kopi Arabika dan Kopi Robusta.
                    </p>
                    <h2 class="text-center welcome-heading" style="color: white">Selamat Datang di Website Toraja Kawaa Roastery</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
@endsection