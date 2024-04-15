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
</style>
@section('container')
<div class="container-fluid row bg justify-content-center opacity-75 overflow-scroll">
    <div class="container content-row p-4">
        <div class="container rounded-lg shadow p-4" style="border-radius:4px;">
            <h2 class="text-centerku">Toraja Kawaa Roastery</h2>
            <div class="row justify-content-center">
                <div class="col-8 g-4 d-flex justify-content-center">
                <img src="{{ asset('gambar/299385752_397934109147635_7327667729942218094_n.jpg') }}" class="rounded-img float-middle" style="width: 200px; height:200px;">
                <p class="text-center" style="color: white; overflow:hidden;">
                    Toraja Kawaa Roastery merupakan pelaku usaha mikro dimana Kopi 
                    Specialty yang dijual pada kemasan kopi Toraja Kawaa Roastery yaitu Kopi Arabika dan Kopi Robusta.
                </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <h2 class="text-center" style="color: white">Selamat Datang di Website Toraja Kawaa Roastery</h2>
            </div>
        </div>
        
    </div>
</div>


<script>

</script>
@endsection