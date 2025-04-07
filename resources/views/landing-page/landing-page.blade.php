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
    }

    .content {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 2rem;
        border-radius: 8px;
        color: white;
        text-align: center;
    }

    .text-centerku {
        color: white;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
    }

    .logo {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .logo img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {
        .welcome-heading {
            font-size: 24px;
        }
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
                <img src="{{ asset('gambar/299385752_397934109147635_7327667729942218094_n.jpg') }}" alt="Toraja Kawaa Roastery Logo">
                <p>
                    Toraja Kawaa Roastery merupakan pelaku usaha mikro yang menjual Kopi Specialty dalam kemasan, 
                    termasuk Kopi Arabika dan Kopi Robusta.
                </p>
                <h2 class="welcome-heading">Selamat Datang di Website Toraja Kawaa Roastery</h2>
            </div>
        </div>
    </div>
</div>
@endsection
