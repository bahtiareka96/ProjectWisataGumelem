<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Testing',
            'username' => 'Testing',
            'phone_number' => '081812813',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            // Tambahkan kolom lain sesuai kebutuhan
        ]);
    }
}
