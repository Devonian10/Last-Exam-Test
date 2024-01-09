<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            "username"=>"Devon",
            "email"=>"ainemio256@gmail.com",
            "password"=>"user123456",
            "phoneNumber"=>"099847475756",
            "status"=> "user",
        ]);
        User::create([
            "username"=>"admin",
            "email"=>"ainemio267@gmail.com",
            "password"=>"admin123456",
            "phoneNumber"=>"02988474753",
            "status"=> "admin",
        ]);
    }
}
