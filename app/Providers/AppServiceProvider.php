<?php

namespace App\Providers;

use App\Models\Cart;
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
    }
}
