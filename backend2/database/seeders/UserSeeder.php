<?php

namespace Database\Seeders;

use App\Models\Departement;
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
        $departements = Departement::all();

        for($i = 0; $i < 30; $i++) {
            $departement = $departements->random();
            User::create([
                'name' => 'User ' . $i,
                'email'=> 'user' . $i . '@gmail.com',
                'departement_id' => $departement->id,
                'password' => bcrypt('admin123')
            ]);
        }

        User::create([
            'name' => 'Admin',
            'email'=> 'admin@admin.com',
            'departement_id' => 1,
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);
    }
}
