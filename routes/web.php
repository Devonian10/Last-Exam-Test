<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

use App\Models\Shop;
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

// Route::get('/', function () {
//     return view('welcome');
//     });

Route::get('/', function () {

    return view('home', ["title" => "Home", "Shop" => Product::all()]);
});
Route::get('/home', function () {

    return view('home', ["title" => "Home", "Shop" => Product::all()]);
});
Route::get('/about', function () {

    return view('about', ["name" => "Toraja Kawaa Roastery", "description" =>
    "Toraja Kawaa roastery adalah salah satu kopi yang nikmat dan ", "location" =>
    "Toraja Kawaa Roastery", "phoneNumber" => 4456732123, "gambar_instagram" => "Ellipse 9.jpg", "gambar_whatsapp" => "WhatsApp 1.jpg"]);
});

Route::get('/shop', function () {
    // $coffee = //[["title" => "Arabica", "priceHarga" => 170000, "gambar" => "20230826_112807.jpg",], ["title" => "Robusta
    //", "priceHarga" => 110000, "gambar" => "20230826_113248.jpg"]];
    return view(
        'shop',
        ["title" => "Kopi", "Shop" => Product::all()]
        //["Kopi" => $coffee, "judul" => "Belanja"]
    );
});
Route::get('/resipembayaran', function () {
});
/* Route::get('/shop/{title}', function(){
    return view('shop',["title"=> Shop::find()]);
}); */
Route::get('/admin', function () {
    return view('admin/dashboard');
});

Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

Route::get('/userAdmin', function () {
    return view('admin/userAdmin', ["title" => "kopi", "users" => User::all()]);
});
Route::get('/userAdmin/createUser', function () {
    return view('admin/user/createUser'); //, ['user'=>User::All()]);
});
Route::get('/userAdmin/editUser', function () {
    return view('admin/user/editUser'); //, ['user'=>User::All()]);
});
Route::post('/userAdmin/createUser', [RegistrationController::class, 'store'])->name('admin.userAdmin.store');
Route::get('/mainlogin', function () {
    return view('layout/mainlogin');
});
Route::delete('/userAdmin/{id}', [RegistrationController::class, 'destroy'])->name('registration.destroy');
Route::get('/profile', function () {
    return view('profile');
});
Route::post('/authentication', [LoginController::class, 'authenticate'])->name('registration.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('registration.logout');

Route::get('/admin/admin', function () {
    return view('admin/admin');
});
Route::get('/order', function () {
    return view('order', ["title" => "kopi", "pesanan" => Order::All()]);
});
Route::post('/order', [OrderController::class, 'store'])->name('orders');
Route::get('/history', function () {
    return view('history');
});
Route::get('/produk', function () {
    return view('admin/produk', ["title" => "kopi", "produk" => Product::all(), "tambah" => Product::all()]);
});
Route::get('produk/tambah', function () {
    return view('admin/createProduk', ["produk" => Product::all()]);
});

Route::post('produk/tambah', [ProductController::class, 'store'])->name('product.store');
Route::get('orderAdmin', function () {
    return view('admin/orderAdmin', ["title" => "kopi", "pesanan" => Order::all()]);
});
Route::get('resipembayaran', function () {
    return view('resipembayaran'); //,'OrderController@resipembayaran' )->name('resipembayaran');
});
//Route::Auth;
// Route::get('/verification', function(){
//     return view('shop', if ($user === ) {
        
//     } else {
//         # code...
//     }
//     )
// })