<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Manager Hotel',
                'email' => 'manager@hotel.com',
                'password' => Hash::make('manager123'),
                'role' => 'manager',
            ],
            [
                'name' => 'Resepsionis 1',
                'email' => 'resepsionis1@hotel.com',
                'password' => Hash::make('resepsionis123'),
                'role' => 'resepsionis',
            ],
            [
                'name' => 'Resepsionis 2',
                'email' => 'resepsionis2@hotel.com',
                'password' => Hash::make('resepsionis123'),
                'role' => 'resepsionis',
            ]
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']], // Cek berdasarkan email
                $user // Jika tidak ada, buat user baru
            );
        }
    }
}
