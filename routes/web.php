<?php

use Illuminate\Support\Facades\Route;

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
    "", "phoneNumber" => 4456732123, ""]);
});
Route::get('/shop', function () {
    return view('shop', $arabica=[
        "title" => "Shopping", "Kopi_1" => "Arabica", "priceHarga" => 170000, "gambar" => "20230826_112807.jpg", "Kopi_2" => "Robusta", "priceHarga2" => 110000,
        "gambar" => "20230826_113248.jpg"
    ], $robusta=["gambar" => "20230826_113248.jpg"]);
});
// Route::get('/verification', function(){
//     return view('shop', if ($user === ) {
        
//     } else {
//         # code...
//     }
//     )
// })