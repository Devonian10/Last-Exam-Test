<nav>
    <div class="row no-gutter mb-5">
        <div class="col">
        {{-- <ul class="nav flex-column bg-dark navbar-admin"> --}}
        <ul class="nav flex-column bg-dark navbar-admin">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="user"><i class="fa-solid fa-dashboard"></i> Dashboard</a><hr class="dark">
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/userAdmin') }}"><i class="fa fa-users"></i> User</a><hr class="dark">
            </li>
            <li class="nav-item">
              <a class="nav-link" href=""><i class="fa-solid fa-material"></i>Pesanan</a><hr class="dark">
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/produk') }}"><i class="fa-solid fa-store"></i> Produk</a><hr class="dark">
            </li>
          </ul>
        </div>
    </div>
</nav>