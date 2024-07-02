<?php

namespace Database\Seeders;

use App\Models\Departement;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::where('id', 108)->delete();
        User::create([
            'name' => 'Jayadi Steven',
            'email' => 'jayadisteven1@gmail.com',
            'password' => bcrypt('pas085156227671'),
            'departement_id' => Departement::where('name', 'PPTI 22')->first()->id
        ]);
        // delete user with email madewikanta1@gmail.com
        // User::where('email', 'madewikanta1@gmail.com')->delete();
    }
}
