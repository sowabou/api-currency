<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PartnerSeeder extends Seeder
{
    public function run()
    {
        // Create some test users
        User::create([
            'name' => 'Khaled Bih',
            'email' => 'khaled@cadorim.com',
            'password' => Hash::make('12345678'), // hashed password
        ]);

        User::create([
            'name' => 'mauripay',
            'email' => 'mauripay@cadorim.com',
            'password' => Hash::make('12345678'), // hashed password
        ]);
    }
}
