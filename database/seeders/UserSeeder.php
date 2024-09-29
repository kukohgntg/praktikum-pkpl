<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat user dengan role_id = 1 (Admin)
        User::create([
            'role_id' => 1,
            'username' => 'admin',
            'slug' => 'admin',
            'password' => 'admin', // Laravel akan otomatis melakukan hashing
            'address' => 'perpustakaan',
            'status' => 'active',
        ]);

        // Membuat user dengan role_id = 2 (User Biasa)
        User::create([
            'role_id' => 2,
            'username' => 'kukohgntg',
            'slug' => 'kukohgntg',
            'password' => 'kukohgntg', // Laravel akan otomatis melakukan hashing
            'address' => 'rumah kukoh',
            'status' => 'active',
        ]);
    }
}
