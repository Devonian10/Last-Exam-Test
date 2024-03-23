@extends('layout.mainAdmin')
@section('title', 'dashboard')

@section('Adminku')
@section('columns')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif
<div class="row p-5 pt-2">
    <h3><i class="fa-solid fa-dashboard mr-2"></i> Dashboard</h3>
    <hr class="bg-secondary">
    <div class="row gy-4 text-white">
        <div class="card mb-2 col mx-4" style="background-color: rgba(0, 0, 255, 0.2);">
            <div class="card-body">
                <div class="d-flex flex-column " style="margin-bottom: 10px;">
                    <div class="rounded bg-blue d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                        <i class="fa-solid fa-cart-shopping text-white"></i>
                    </div>
                </div>
                <h5 class="mb-0">Product</h5>

                <div class="display-4">{{ $productCount }}</div>
                <div class="card-text mt-3"><a style="text-decoration: none; color: blue" href="{{ url('produk') }}">Lihat Detail</a></div>
            </div>
        </div>
        <div class="card mb-2 col mx-4" style="background-color: rgba(0, 255, 0, 0.2);">
            <div class="card-body">
                <div class="d-flex flex-column " style="margin-bottom: 10px;">
                    <div class="rounded bg-green d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                        <i class="fa-solid fa-users i-dashboard-icon text-white"></i>
                    </div>
                </div>
                <h5 class="card-title">Users</h5>
                <div class="display-4">{{ $userCount }}</div>
                <div class="card-text mt-3"><a style="text-decoration: none; color: green" href="{{ url('userAdmin') }}">Lihat Detail</a></div>
            </div>
        </div>

        <div class="card mb-2 col mx-4" style="background-color: rgba(255,0, 0, 0.2);">
            <div class="card-body">
                <div class="d-flex flex-column " style="margin-bottom: 10px;">
                    <div class="rounded bg-red d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                        <i class="fa-solid fa-cart-shopping i-dashboard-icon text-white"></i>
                    </div>
                </div>
                <h5 class="card-title">Order</h5>
                <div class="display-4">{{ $orderCount }}</div>
                <div class="card-text mt-3"><a style="text-decoration: none; color: red" href="{{ url('orderAdmin') }}">Lihat Detail</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
@endsection