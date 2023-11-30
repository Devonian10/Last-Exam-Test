@extends('layout.mainAdmin')
@section('title', 'Dashboard')

@section('Adminku')
    <div class="row no-gutter mt-5">
        <div class="col"></div>
        <ul class="nav flex-column bg-dark">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pesanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
          </ul>
    </div>
    
@endsection