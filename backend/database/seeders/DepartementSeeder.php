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
        Departement::create([
            'name' =>'admin'
        ]);
        Departement::create([
            'name' => 'ppti20',
        ]);

        Departement::create([
            'name' => 'ppti21',
        ]);

        Departement::create([
            'name' => 'ppti22',
        ]);
    }
}
