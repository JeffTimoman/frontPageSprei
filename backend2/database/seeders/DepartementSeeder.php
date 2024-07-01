<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Departement::create([
        //     'name' => 'PPTI 20'
        // ]);
        // Departement::create([
        //     'name' => 'PPTI 21'
        // ]);
        // Departement::create([
        //     'name' => 'PPTI 22'
        // ]);

        Departement::create([
            'name' => 'ADMIN'
        ]);

        Departement::create([
            'name' => 'PPTI 20'
        ]);

        Departement::create([
            'name' => 'PPTI 21'
        ]);

        Departement::create([
            'name' => 'PPTI 22'
        ]);
    }
}
