@extends('layout.mainAdmin')
@section('title', 'dashboard')

@section('Adminku')
    @section('columns')
    <div class="col-md-10 p-5 pt-2">
        <i class="fa-solid fa-dashboard mr-2"> Dashboard</i><hr class="bg-secondary">
        <div class="row text-white">
            <div class ="card bg-grey mb-5 " style="width:18rem;">
                <div class="card-body">
                    <div class="card-body-icon bg-red">
                    <i class="fa-solid fa-cart-shopping ml-2"></i></div>
                    <h5 class="card-title">Product</h5>
                    <div class="dispaly-4">10000</div>
                </div>
            </div>
            <div class ="card bg-grey mb-3" style="width:18rem;">
                <div class="card-body">
                    <div class="card-body-icon bg-blue">
                    <i class="fa-solid fa-user ml-2"></i></div>
                    <h5 class="card-title">Users</h5>
                    <div class="dispaly-4">10000</div>
                </div>
            </div>
            <div class ="card bg-grey mb-3" style="width:18rem;">
                <div class="card-body">
                    <div class="card-body-icon bg-green">
                    <i class="fa-solid fa-cart-shopping ml-2"></i></div>
                    <h5 class="card-title">Order</h5>
                    <div class="dispaly-4">10000</div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@endsection