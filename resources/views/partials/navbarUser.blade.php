<nav>
    <div class="topnav">
        <img src="{{  asset('gambar/299385752_397934109147635_7327667729942218094_n4.jpg')}}" style="width:100px; height:60px;display:flex;" class="left"/>
        <a href="/" class="active">Home</a>
        <a href="/shop">Shop</a>
        <a href="/order">Order</a>
        <a href="/history">History</a>
        <a href="/about">About Us</a>
        @auth
        <a href="/mainlogin" class="right"><img src="" alt=""><i class="fa-solid fa-user"></i></a>
        
        <a href="/registration" class="right">logout</a>
        @endauth
    </div>
</nav>