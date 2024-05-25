<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456789'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Vendor',
            'username' => 'vendor',
            'email' => 'vendor@example.com',
            'password' => Hash::make('123456789'),
            'role' => 'vendor',
        ]);

        User::create([
            'name' => 'Test User',
            'username' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
