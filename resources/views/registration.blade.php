{{-- @extends('layout.main') --}}

@section('title', 'Registration')

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
   
    {{-- @section('container') --}}
    <div class="registration container mt-4" style="background-color: brown">
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mt-4 pt-2" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
        @endif
        <h2 class="judul2 text-center pt-2">Registration</h2>
        @if ('success')
            <div></div>
        @endif
        <form action="{{ route('registration.store') }}" method="post">
            @csrf
        <div class="row g-3">
        <div class="col text-center ">
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control @error ('username') is-invalid @enderror" id="username" placeholder="Username" name="username" required>
            </div>
            @error('username')
                <div id="username" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="col">
                <label for="Email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email"required>
            </div>
            @error('email')
                <div id="email" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <br>
        <div class="row g-3">
            <div class="col">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control @error ('password') is-invalid @enderror "id="password"name = "password" placeholder="Password" required>
            </div>
            @error('password')
                <div id="password" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="col">
                <label for="Confirm Password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control @error ('password') is-invalid @enderror"name ="password_confirmation" id="password" placeholder="password" required>
            </div>
            @error('password')
                <div id="password" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row g-3 mt-2">
            <div class="col">
                <label for="Phone number" class="form-label">Phone Number</label>
                <input type="text" class="form-control " name = "phone_number" placeholder="Phone Number" style="width:536.5px">
            </div>
        </div>
            <div class="text-center mt-5 button-registration">
                <a href="{{ url('/') }}" type="submit" class = "btn btn-primary align-items-center justify-content-center  mb-4 mx-5">back</a>
                <button type="submit" class="btn btn-primary align-items-center justify-content-center mb-4 mx-5" style="text-align: justify;">register</button>
            </div>
            <div class="text-center">
            <small style="text-align: center;color:antiquewhite">Already Login? <a href="/mainlogin">Login</a></small>
        </div>
        </form>
    </div>
    {{-- @endsection --}}
</body>
</html>




