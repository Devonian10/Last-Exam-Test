@extends('layout.mainAdmin')
@section('title', 'dashboard')

@section('Adminku')
    @section('columns')
    <div class="row p-5 pt-2">
        <h3><i class="fa-solid fa-dashboard mr-2"></i> Dashboard</h3><hr class="bg-secondary">
        <div class="row gy-4 text-white">
            <div class ="card bg-grey mb-2 col mx-4" >
                <div class="card-body">
                    <div class="card-body-icon bg-red">
                    <i class="fa-solid fa-cart-shopping ml-2 i-dashboard-icon"></i></div>
                    <h5 class="card-title">Product</h5>
                    <div class="dispaly-4">10000</div>
                    <div class="card-text"><a href="{{ url('produk') }}">Lihat Detail</a></div>
                </div>
            </div>
            <div class ="card bg-grey mb-2 col mx-4" >
                <div class="card-body">
                    <div class="card-body-icon bg-blue">
                    <i class="fa-solid fa-user ml-2 i-dashboard-icon"></i></div>
                    <h5 class="card-title">Users</h5>
                    <div class="dispaly-4">10000</div>
                    <div class="card-text"><a href="{{ url('userAdmin') }}">Lihat Detail</a></div>
                </div>
            </div>
            <div class ="card bg-grey mb-2 col mx-4" >
                <div class="card-body">
                    <div class="card-body-icon bg-green">
                    <i class="fa-solid fa-cart-shopping ml-2 i-dashboard-icon "></i></div>
                    <h5 class="card-title">Order</h5>
                    <div class="dispaly-4">10000</div>
                    <div class="card-text"><a href="{{ url('orderAdmin') }}">Lihat Detail</a></div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@endsection