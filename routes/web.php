<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Models\Shop;
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

    return view('home');
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
        'shop', ["title"=> "Kopi", "Shop"=> Product::all()]
        //["Kopi" => $coffee, "judul" => "Belanja"]
    );
});
/* Route::get('/shop/{title}', function(){
    return view('shop',["title"=> Shop::find()]);
}); */
Route::get('/admin', function () {
    return view('admin/dashboard');
});

Route::get('/registration', function () {
    return view('registration');
});
Route::get('/userAdmin', function () {
    return view('admin/userAdmin');
});
Route::get('/mainlogin', function () {
    return view('layout/mainlogin');
});
Route::post('/mainlogin/registration', function () {
    return self::find();
});
Route::get('/admin/admin', function () {
    return view('admin/admin');
});
Route::get('/order', function () {
    return view('order');
});
Route::get('history', function () {
    return view('history');
});
Route::get('produk', function(){
    return view('admin/produk');
});
Route::get('orderAdmin', function(){
    return view('admin/orderAdmin');
});
//Route::Auth;
// Route::get('/verification', function(){
//     return view('shop', if ($user === ) {
        
//     } else {
//         # code...
//     }
//     )
// })