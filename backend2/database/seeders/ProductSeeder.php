<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Khaki',
            'image' => 'khaki.jpg',
        ]);

        //Petal
        Product::create([
            'name' => 'Petal',
            'image' => 'petal.jpg',
        ]);

        //Blue Mint
        Product::create([
            'name' => 'Blue Mint',
            'image' => 'blue-mint.jpg',
        ]);

        //Pink
        Product::create([
            'name' => 'Pink',
            'image' => 'pink.jpg',
        ]);

        //Biru Tua
        Product::create([
            'name' => 'Biru Tua',
            'image' => 'biru-tua.jpg',
        ]);

        //Cream
        Product::create([
            'name' => 'Cream',
            'image' => 'cream.jpg',
        ]);
    }
}
