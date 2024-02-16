<nav>
    <div class="topnav">
        <img src="{{  asset('gambar/299385752_397934109147635_7327667729942218094_n.jpg')}}" style="width:60px; height:60px;display:flex; padding:2px; border-radius:9999px" class="left"/>
        <a href="{{ url('/home') }}" class="">Home</a>
        <a href="{{ url('/shop') }}">Shop</a>
        <a href="{{ url('/order') }}">Order</a>
        <a href="{{ url('/history') }}">History</a>
        <a href="{{ url('/about') }}">About Us</a>
        @if(!Auth::check())
        <a href="{{ url('/mainlogin') }}" class="right">login</a>
        <a href="{{ url('/registration') }}" class="right">Signup</a>
        @else 
        <a href="{{ route('registration.logout') }}" class="right">Logout</a>
        <a class="right">Welcome, {{ Auth::user()->username }}</a>
        @endif
        
    </div>
</nav>