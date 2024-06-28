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
            'email' => 'admin@admin.com',
            'name' => 'Admin',
            'role' => 'admin',
            'status' => 'active',
            'password' => bcrypt('admin123'),
            'buying_limit' => 1000,
            'departement_id' => 1,
        ]);

        User::create([
            'email' => 'user@admin.com',
            'name' => 'User',
            'status' => 'active',
            'password' => bcrypt('admin123'),
            'departement_id' => 1
        ]);

        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'email' => 'user' . $i . '@admin.com',
                'name' => 'User ' . $i,
                'status' => 'active',
                'password' => bcrypt('admin123'),
                'departement_id' => 1
            ]);
        }
    }
}
