<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::create([
            "nama_kopi"=>"Arabica",
            "harga"=> 170000,
            "gambar"=>"gambar/20230826_112807.jpg",
            "stock"=> 0,
            "status"=> "public",
            
        ]);
        Product::create([
            "nama_kopi"=>"Robusta",
            "harga"=> 110000,
            "gambar"=>"gambar/20230826_113248.jpg",
            "stock"=> 0,
            "status"=> "public",
            
        ]);
    }
}
