@extends('layout.landing')

@section('title', 'Landing Page')

@section('container')
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .bg {
        height: 100vh;
        width: 100vw;
        background-image: url("{{ asset('gambar/20230826_105056.jpg') }}");
        background-size: cover;
        background-position: center;
        position: fixed;
        z-index: -1;
    }

    .black-overlay {
        height: 100vh;
        width: 100vw;
        background-color: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(5px);
        position: fixed;
        z-index: 0;
    }

    .content-row {
        position: relative;
        z-index: 1;
        text-align: center;
    }

    .content {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 2rem;
        border-radius: 8px;
        color: white;
    }

    .btn-custom {
        margin: 10px;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
    }

    .btn-login {
        background-color: #007bff;
        color: white;
    }

    .btn-signup {
        background-color: #28a745;
        color: white;
    }

    .logo img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin-bottom: 15px;
    }

    @media (max-width: 768px) {
        .content {
            padding: 1.5rem;
        }
    }
</style>

<div class="container-fluid d-flex justify-content-center align-items-center bg">
    <div class="black-overlay"></div>
    <div class="container content-row">
        <div class="content shadow-lg">
            <div class="logo">
                <img src="{{ asset('gambar/logo.jpg') }}" alt="Logo">
                <h2>Selamat Datang di Toraja Kawaa Roastery</h2>
                <p>Jelajahi keunikan Kopi Toraja dari kami.</p>
                <button class="btn btn-custom btn-login" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                <button class="btn btn-custom btn-signup" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Sign Up -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
