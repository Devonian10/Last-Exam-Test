<nav>
    <div class="topnav">
        <img src="{{  asset("gambar/299385752_397934109147635_7327667729942218094_n.jpg")}}" style="width:60px; height:60px;display:flex; border-radius:9999px" />

        @if(!Auth::check())
        <a href="{{ url('/login') }}" class="right">login</a>
        <a href="{{ url('/registration') }}" class="right">Signup</a>
        @else
        <a href="{{ route('registration.logout') }}" class="right">Logout</a>
        <a class="right">Welcome, {{ Auth::user('admin')->username}}</a>
        @endif
        <a href="{{ url('/') }}" class="right">Show as Client</a>


    </div>
</nav>