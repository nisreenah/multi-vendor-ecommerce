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
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456789'),
            'role' => 'admin',
        ]);
        $admin->assignRole('admin');

        $vendor = User::create([
            'name' => 'Vendor',
            'username' => 'vendor',
            'email' => 'vendor@example.com',
            'password' => Hash::make('123456789'),
            'role' => 'vendor',
        ]);
        $vendor->assignRole('vendor');

        $user = User::create([
            'name' => 'Test User',
            'username' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('123456789'),
        ]);
        $user->assignRole('user');
    }
}
