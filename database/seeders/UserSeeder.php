<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah email sudah ada sebelum menambah data
        if (!User::where('email', 'admin@hotel.com')->exists()) {
            User::create([
                'name' => 'Admin Hotel',
                'email' => 'admin@hotel.com',
                'password' => Hash::make('Admin123!'),
                'role' => 'manager',
            ]);
        }

        if (!User::where('email', 'resepsionis@hotel.com')->exists()) {
            User::create([
                'name' => 'Resepsionis Hotel',
                'email' => 'resepsionis@hotel.com',
                'password' => Hash::make('Resepsionis123!'),
                'role' => 'resepsionis',
            ]);
        }
    }
}
