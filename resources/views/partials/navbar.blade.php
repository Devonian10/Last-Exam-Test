<nav>
    <div class="topnav">
        <img src="{{ asset('gambar/299385752_397934109147635_7327667729942218094_n.jpg')}}" style="width:60px; height:60px;display:flex; padding:2px; border-radius:9999px" class="left" />
        <a href="{{ url('/') }}" class="">Home</a>
        @if(Auth::check())
        <a href="{{ route('shop.index') }}">Shop</a>
        <!-- <a href="{{ url('/resipembayaran') }}">Cart</a> -->
        <!-- <a href="{{ url('/order') }}">Order</a> -->
        <a href="{{ url('/history') }}">History</a>
        @endif
        <a href="{{ url('/about') }}">About Us</a>
        @if(!Auth::check())
        <a href="{{ url('/login') }}" class="right">Login</a>
        <a href="{{ url('/registration') }}" class="right">Signup</a>
        @else
        <a href="{{ route('registration.logout') }}" class="right">Logout</a>
        <a class="right" href="{{ url('/profile') }}">Welcome, {{ Auth::user()->username }}</a>
        @if(Auth::user()->status==='admin')
        <a href="{{ url('/admin') }}" class="right">Admin</a>
        <a id="cartItem" href="{{url('/cartItem')}}" class="cart-icon right">
            <i class="fa-solid fa-cart-shopping fa-lg"></i>
            <span class="badge">{{ $cartItemCount }}</span>
        </a>
        @endif

        @endif
    </div>
</nav>