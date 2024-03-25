<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'guest'])->group(function () {
    Route::get('/', function () {
        return view('home', ["title" => "Home", "Shop" => Product::all()]);
    })->name('home');
});

Route::middleware(['auth'])->group(function () {
    // About
    Route::get('/about', function () {
        return view('about', ["name" => "Toraja Kawaa Roastery", "description" =>
        "Toraja Kawaa roastery adalah salah satu kopi yang nikmat dan ", "location" =>
        "Toraja Kawaa Roastery", "phoneNumber" => 4456732123, "gambar_instagram" => "Ellipse 9.jpg", "gambar_whatsapp" => "WhatsApp 1.jpg"])->name('about');
    });

    Route::get('/shop', [CartController::class, 'index'])->name('shop.index');
    Route::post('/shop/buy/{Shop}', [CartController::class, 'buy'])->name('shop.buy');
    // Route::post('/shop')
    // Authentication
    Route::post('/authentication', [LoginController::class, 'authenticate'])->name('admin.dashboard.authenticate');
    Route::get('/logout', [LoginController::class, 'logout'])->name('registration.logout');

    // Profile
    Route::get('/profile', function () {
        return view('profile');
    });

    // Order
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');

    // History
    Route::get('/history', function () {
        return view('history');
    });

    // Receipt
    Route::get('/resipembayaran', function () {
        return view('resipembayaran');
    });
    Route::get('/cartItem', [CartController::class, 'indexCart'])->name('cartItem');
    
    Route::post('/resipembayaran', [OrderController::class, 'store'])->name('resipembayaran.store');
    Route::post('/addToCart', [CartController::class, 'addToCart'])->name('addToCart');
    Route::post('/uploadPayment', [CartController::class, 'uploadPayment'])->name('upload.payment');
    Route::delete('/cart/remove/{cartItemId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});

// Routes for guests (not logged in)
Route::middleware(['guest'])->group(function () {
    // Registration
    Route::get('/registration', function () {
        return view('registration');
    })->name('registration');
    Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

    // Login
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::post('/authentication', [LoginController::class, 'authenticate'])->name('registration.authenticate');

    // About
    Route::get('/about', function () {
        return view('about', ["name" => "Toraja Kawaa Roastery", "description" =>
        "Toraja Kawaa roastery adalah salah satu kopi yang nikmat dan ", "location" =>
        "Toraja Kawaa Roastery", "phoneNumber" => 4456732123, "gambar_instagram" => "Ellipse 9.jpg", "gambar_whatsapp" => "WhatsApp 1.jpg"]);
    });
});

// Admin route
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    // Route::get('/userAdmin', function () {
    //     return view('admin/userAdmin', ["title" => "kopi", "users" => User::all()]);
    // });
    //Admin User
    Route::get('/userAdmin', [UserController::class, 'index'])->name('userAdmin.index');
    // Route::get('/userAdmin/createUser', function () {
    //     return view('admin/user/createUser');
    // });
    Route::get('/userAdmin/createUser', [UserController::class, 'create'])->name('users.create');
    Route::post('/userAdmin/createUser', [UserController::class, 'store'])->name('users.store');
    Route::get('/userAdmin/editUser', function () {
        return view('admin/user/editUser');
    });
    Route::get('/userAdmin/{id}/editUser', [UserController::class, 'editAdmin'])->name('users.update');
    Route::put('/userAdmin/{id}/editUser', [UserController::class, 'update'])->name('users.update');
    Route::delete('/userAdmin/{id}', [RegistrationController::class, 'destroy'])->name('registration.destroy');

    //Order Admin
    Route::get('/orderAdmin', [OrderController::class, 'indexAdmin'])->name('orderAdmin.indexAdmin');
    Route::get('/orderAdmin/{id}/editOrder', [OrderController::class, 'editOrder'])->name('orderAdmin.update');
    Route::put('/orderAdmin/{id}/editOrder', [OrderController::class, 'updateOrder'])->name('orderAdmin.update');
    Route::get('/transaksi');
    // Route::get('/produk/create', function () {
    //     return view('admin/createProduk');
    // });
    Route::delete('/orderAdmin/{id}', [OrderController::class, 'destroy'])->name('orderAdmin.destroy');
    Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
    // Membuat Produk
    Route::post('/produk/store',  [ProductController::class, 'store'])->name('produk.store');
    Route::get('/produk/store',  [ProductController::class, 'create'])->name('produk.create');
    // Route::get('/produk/store', function () {
    //     return view('admin/createProduk');
    // })->name('produk.create');

    // Route::get('/produk/edit', function () {
    //     return view('admin/editProduk')->name('produk.edit');
    // });
    Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->name('produk.update');
    Route::put('/produk/{id}/edit', [ProductController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->name('produk.destroy');

    // Route::get('/produk', function () {
    //     return view('admin/produk', ["title" => "kopi", "produk" => Product::all(), "tambah" => Product::all()]);
    // })->name('produk.index');
    // Route::resource('products', [ProductController::class]);
    // Route::get('/produk/tambah', function () {
    //     return view([ProductController::class, 'create'])->name('produk.create');
    // });
});
