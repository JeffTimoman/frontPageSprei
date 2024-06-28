<?php

namespace Database\Seeders;

use App\Models\WebVariable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebVariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebVariable::create([
            'name' => 'AllowLogin',
            'value' => '0'
        ]);

        WebVariable::create([
            'name' => 'AllowPurchaseDateTime',
            'value' => '2021-01-01 00:00:00'
        ]);

        WebVariable::create([
            'name' => 'AllowPurchase',
            'value' => '0'
        ]);

    }
}
