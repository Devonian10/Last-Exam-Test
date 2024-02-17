<nav>
  <div class="row no-gutters" style="height: calc(100vh - 65px); width: 100%;">
    <div class="col-md-2 bg-dark pt-4">
      {{-- <ul class="nav flex-column bg-dark navbar-admin"> --}}
      <ul class="nav flex-column navbar-admin ml-4 mb-5" style>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="{{ url('/admin') }}"><i class="fa-solid fa-dashboard mr-2"></i> Dashboard</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('/userAdmin') }}"><i class="fa fa-users mr-2"></i> User</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('/orderAdmin') }}"><i class="fa-solid fa-address-card mr-2"></i> Pesanan</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('/produk') }}"><i class="fa-solid fa-store mr-2"></i> Produk</a>
          <hr class="bg-secondary">
        </li>
        <!-- <li class="nav-item">
          <a href="{{ url('/login') }}" class="nav-link text-white"><i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Logout</a>
          <hr class="bg-secondary">
        </li> -->
      </ul>
    </div>
    <div class="col-md-10 pt-2">
      @yield('columns')
    </div>
  </div>
  </div>
</nav>