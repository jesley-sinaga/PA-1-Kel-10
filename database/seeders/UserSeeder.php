<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buat akun Manager (Admin)
        User::create([
            'name' => 'Admin Hotel',
            'email' => 'admin@hotel.com',
            'password' => Hash::make('Admin123!'),
            'role' => 'manager',
        ]);

        // Buat akun Resepsionis
        User::create([
            'name' => 'Resepsionis Hotel',
            'email' => 'resepsionis@hotel.com',
            'password' => Hash::make('Resepsionis123!'),
            'role' => 'resepsionis',
        ]);
    }
}
