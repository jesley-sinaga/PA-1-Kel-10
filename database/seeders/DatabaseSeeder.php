<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Hotel Manager',
            'email' => 'manager@hotel.com',
            'password' => Hash::make('password'),
            'role' => 'manager'
        ]);

        User::create([
            'name' => 'Resepsionis 1',
            'email' => 'resepsionis1@hotel.com',
            'password' => Hash::make('password'),
            'role' => 'resepsionis1'
        ]);

        User::create([
            'name' => 'Resepsionis 2',
            'email' => 'resepsionis2@hotel.com',
            'password' => Hash::make('password'),
            'role' => 'resepsionis2'
        ]);
    }
}
