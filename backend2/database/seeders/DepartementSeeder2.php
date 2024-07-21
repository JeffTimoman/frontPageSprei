<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departement::create([
            'name' => 'PPBP 7'
        ]);

        Departement::create([
            'name' => 'PPBP 8'
        ]);
    }
}
