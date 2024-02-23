<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
    });
});

Route::middleware(['auth'])->group(function () {
    // About
    Route::get('/about', function () {
        return view('about', ["name" => "Toraja Kawaa Roastery", "description" =>
        "Toraja Kawaa roastery adalah salah satu kopi yang nikmat dan ", "location" =>
        "Toraja Kawaa Roastery", "phoneNumber" => 4456732123, "gambar_instagram" => "Ellipse 9.jpg", "gambar_whatsapp" => "WhatsApp 1.jpg"]);
    });

    // Shop
    Route::get('/shop', function () {
        return view('shop', ["title" => "Kopi", "Shop" => Product::all()]);
    });

    // Authentication
    Route::post('/authentication', [LoginController::class, 'authenticate'])->name('admin.dashboard.authenticate');
    Route::get('/logout', [LoginController::class, 'logout'])->name('registration.logout');

    // Profile
    Route::get('/profile', function () {
        return view('profile');
    });

    // Order
    Route::get('/order', function () {
        return view('order', ["title" => "kopi", "pesanan" => Order::All()]);
    });
    Route::post('/order', [OrderController::class, 'store'])->name('orders');

    // History
    Route::get('/history', function () {
        return view('history');
    });

    // Receipt
    Route::get('/resipembayaran', function () {
        return view('resipembayaran');
    });
    Route::post('/resipembayaran', [OrderController::class, 'store'])->name('resipembayaran.store');
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
    Route::get('/userAdmin', function () {
        return view('admin/userAdmin', ["title" => "kopi", "users" => User::all()]);
    });
    Route::post('/userAdmin/createUser', [UserController::class, 'create'])->name('users.create');
    Route::get('/userAdmin/editUser', function () {
        return view('admin/user/editUser');
    });
    Route::get(
        '/userAdmin/createUser',
        function () {
            return view('admin/user/createUser');
        }
    );
    Route::delete('/userAdmin/{id}', [RegistrationController::class, 'destroy'])->name('registration.destroy');
    Route::get('/orderAdmin', function () {
        return view('admin/orderAdmin', ["title" => "kopi", "pesanan" => Order::all()]);
    });
    Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', function () {
        return view('admin/createProduk');
    });
    Route::post('/produk/store',  [ProductController::class, 'store'])->name('produk.store');
    Route::get('/produk/store', function () {
        return view('admin/createProduk');
    })->name('produk.create');
    Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->name('produk.destroy');

    // Route::get('/produk', function () {
    //     return view('admin/produk', ["title" => "kopi", "produk" => Product::all(), "tambah" => Product::all()]);
    // })->name('produk.index');
    // Route::resource('products', [ProductController::class]);
    // Route::get('/produk/tambah', function () {
    //     return view([ProductController::class, 'create'])->name('produk.create');
    // });
});
