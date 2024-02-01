@section('title', 'Login')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg" href="gambar/coffee.svg"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{  asset("css/style2.css")}}">
    <link rel="stylesheet" href="{{  asset("css/style.css")}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abyssinica+SIL&family=Hedvig+Letters+Serif:opsz@12..24&family=Playpen+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abyssinica+SIL&family=Playpen+Sans:wght@300&display=swap" rel="stylesheet">
    <title>Toraja Kawaa Roastery | @yield('title') </title>
</head>

<body>
    @include('partials.navbar')
    @if (session()->has('success'))
        
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
      </div>
        
    @endif

    @if (session()->has('loginError'))
        
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
      </div>
        
    @endif
        
    
    <div class="row justify-content-md-center">
        <div class="col-xs-1 text-center">
            <section class="login-box">
                <div class="card border-info justify-content-center" style="border-radius: 4rem; width:45rem; ">
                <h2 style="font-family: cursive">login Toraja Kawaa roastery</h2>
                <form id="loginform" method="post" action="{{ route('registration.authenticate') }}">
                    @csrf
                    <label for="username" style="font-family: 'Times New Roman', Times, serif">Username</label>
                    <br />
                    <input type="text" placeholder="Username" name="username" />
                    <br />
                    <label for="password" style="
                text-align: justify;
                font-family: 'Times New Roman', Times, serif;">Password</label>
                    <br />
                    <input type="text" placeholder="Password" name="password" />
                    <br />
                    <label for="confirmPassword" placeholder="Confirm Password" name="Confirm Password"></label>
                    <br>
                    <br />
                    <button type="submit" class="btn btn-success" value="Login">
                        Login
                    </button>
                    <a type="button" href="{{ route('registration') }}" class="btn btn-warning" value="Signup" style="right: 50%">
                        Sign up
                    </a>
                </form>
            </section>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>