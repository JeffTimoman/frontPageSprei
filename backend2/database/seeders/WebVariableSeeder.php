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
            'value' => '1',
        ]);

        WebVariable::create([
            'name' => 'BlockClaimTime',
            'value' => '2024-06-29 23:59:59'
        ]);
    }
}
