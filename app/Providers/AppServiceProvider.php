<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['resipembayaran', 'cart.shop', 'about', 'history', 'home', 'profile'], function ($view) {
            $userId = auth()->user()->id; // Ambil ID pengguna saat ini
            $cartItemCount = Cart::where('users_id', $userId)->count(); // Hitung jumlah item dalam keranjang belanja untuk pengguna yang sesuai
            $view->with('cartItemCount', $cartItemCount); // Tambahkan $cartItemCount ke view
        });
        // #untuk Ubah Force Laravel HTTPS menggunakan Production APP_ENV = production dan diubah ke APP_URL 
        // tetapi tidak ada HTTPS 
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        } else {
            URL::forceScheme('http');
        }
    }
}
