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
        background-image: url('{{ asset("gambar/20230826_105056.jpg") }}');
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
<div class="container-fluid content-row bg justify-content-center">
    <h1 class="text-centerku"></h1>
    <div class="container content-row p-4">
        <div class="container rounded-lg shadow p-4" style="border-radius:4px;">
            <h2 class="text-centerku">Toraja Kawaa Roastery</h2>
            <div class="row">
                <div class="col-8">
                <img src="{{ asset('gambar/299385752_397934109147635_7327667729942218094_n.jpg') }}" class="rounded-img float-middle" style="width: 200px; height:200px;">
                <p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam asperiores officiis voluptatum magni laboriosam! Animi modi quasi velit, optio nemo, rerum culpa cumque porro corrupti laudantium mollitia, quam aspernatur reprehenderit.</p>
                </div>
            </div>
            @foreach($Shop as $produk)
            <div class="row mb-4 g-6 justify-content-center">
                <img src={{ $produk->gambar }} alt="" class="rounded-img">
            </div>
            @endforeach
        </div>
    </div>
</div>


<script>
    var e = ""

</script>
@endsection