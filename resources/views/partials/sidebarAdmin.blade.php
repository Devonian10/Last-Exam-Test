<nav>
    <div class="row no-gutters ">
        <div class="col-md-2 bg-dark pr-3">
        {{-- <ul class="nav flex-column bg-dark navbar-admin"> --}}
        <ul class="nav flex-column navbar-admin" style>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="user"><i class="fa-solid fa-dashboard"></i> Dashboard</a><hr class="dark">
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/userAdmin') }}"><i class="fa fa-users"></i> User</a><hr class="dark">
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/orderAdmin') }}"><i class="fa-solid fa-address-card"></i> Pesanan</a><hr class="dark">
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/produk') }}"><i class="fa-solid fa-store"></i> Produk</a><hr class="dark">
            </li>
          </ul>
        </div>
    </div>
</nav>