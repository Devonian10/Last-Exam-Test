@section('title', 'Login')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg" href="gambar/coffee.svg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{  asset("css/style2.css")}}">
    <link rel="stylesheet" href="{{  asset("css/style.css")}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abyssinica+SIL&family=Hedvig+Letters+Serif:opsz@12..24&family=Playpen+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abyssinica+SIL&family=Playpen+Sans:wght@300&display=swap" rel="stylesheet">
    <title>Toraja Kawaa Roastery | @yield('title') </title>
    <style>
        .bg {
            height: 100vh;
            width: 100%;
            background-image: url('{{ asset("gambar/20230826_105056.jpg") }}');
            background-size: cover;
            position: absolute;
            z-index: 2;
        }

        .black-overlay {
            height: 100vh;
            width: 100%;
            position: relative;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1;
            backdrop-filter: blur(5px);
        }


        .login-card {
            opacity: 1;
            backdrop-filter: blur(5px);
            background-color: rgba(0, 0, 0, 0.2);
            border: 2px solid yellow;
            align-items: center;
        }

        .login-card input {
            width: 380px;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .login-card #loginform {
            width: 380px;
            text-align: left;
        }

        .login-card button {
            width: 100%;
        }

        .login-card a {
            width: 100%;
        }
    </style>
</head>

<body>
    {{-- @include('partials.navbar') --}}
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x" role="alert" style="z-index: 1000;">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x" role="alert" style="z-index: 1000;">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif

    <div class="bg">
        <div class="black-overlay">
            <div class="content">
                <div class="row justify-content-md-center" style="align-items: center; justify-content:center;display:flex;width:100%;height:85vh;">
                    <div class="col-xs-1 text-center">
                        <section class="login-box" style="align-items: center; justify-content:center;display:flex;width:100%;">
                            <div class="card justify-content-center py-5 login-card" style="border-radius: 2rem; width:45rem; ">
                                <center>
                                    <a href="{{url('/')}}">
                                        <img src="{{ asset('gambar/299385752_397934109147635_7327667729942218094_n.jpg') }}" alt="" style="width: 150px; height:100%">
                                    </a>
                                </center>
                                <h2 style="font-family: cursive; color: white" class="mb-4">Login Toraja Kawaa Roastery</h2>
                                <form id="loginform" method="post" action="{{ route('registration.authenticate') }}">
                                    @csrf
                                    <label for="username" style="color: white; font-family: 'Times New Roman', Times, serif">Username</label>
                                    <br />
                                    <input type="text" placeholder="Username" name="username" />
                                    <br />
                                    <label for="password" style="color: white; text-align: justify;font-family: 'Times New Roman', Times, serif; margin-top: 10px;">Password</label>
                                    <br />
                                    <input type="password" placeholder="Password" name="password" />
                                    <br />
                                    <label for="confirmPassword" placeholder="Confirm Password" name="Confirm Password"></label>
                                    <br>
                                    <br />
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-success" value="Login">
                                                Login
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a type="button" href="{{ route('registration') }}" class="btn btn-warning" value="Signup" style="right: 50%">
                                                Sign up
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>