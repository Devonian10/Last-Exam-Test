<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       Order::create([
        "users_id"=>1, 
        "product_id"=> 2,
        "Total_harga"=>190000,
        "status"=>"success",
        "Alasan_cancel"=>null
       ]);
    }
}
