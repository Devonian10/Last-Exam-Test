<nav>
    <div class="topnav">
        <img src="{{  asset('gambar/299385752_397934109147635_7327667729942218094_n.jpg')}}" style="width:60px; height:60px;display:flex;border-radius:9999px " class="left" />
        <a href="{{ route('landing-page.index', $id) }}" class="">Home</a>
        <a href="{{ route('landing-shop.show', $id) }}">Shop</a>
        <a href="{{ route('order.index') }}">Order</a>
        <a href="{{ url('/history') }}">History</a>
        <a href="{{ route('landing-about.about', $id) }}">About Us</a>
        @auth
        @if(Auth::user()->status==='admin')
        <a href="{{ url('/') }}" class="right">{{Auth::user()->status}}</a>
        @endif
        <a href="{{ route('login') }}" class="right"><img src="{{ '' }}" alt=""><i class="fa-solid fa-user"></i></a>
        <a href="{{ url('/') }}" class="right">logout</a>
        @endauth
        @auth
          <a href="{{ route('login') }}">Login</a>
          <a href="{{ route('registration') }}">Sign Up</a>  
        @endauth
    </div>
</nav>