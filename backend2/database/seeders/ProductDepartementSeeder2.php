<?php

namespace Database\Seeders;

use App\Models\Departement;
use App\Models\Product;
use App\Models\ProductDepartement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDepartementSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departement = Departement::where('name', 'PPBP 7')->first();
        //Khaki : Qty: 12
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Khaki')->first()->id,
            'quantity' => 11
        ]);

        //Petal : Qty: 7
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Petal')->first()->id,
            'quantity' => 7
        ]);

        //Blue Mint : Qty: 17
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Blue Mint')->first()->id,
            'quantity' => 16
        ]);

        //Pink : Qty: 11
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Pink')->first()->id,
            'quantity' => 27
        ]);

        //Biru Tua : Qty: 17
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Biru Tua')->first()->id,
            'quantity' => 15
        ]);

        //Cream : Qty: 8
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Cream')->first()->id,
            'quantity' => 16
        ]);

        $departement = Departement::where('name', 'PPBP 8')->first();
        //Khaki : Qty: 12
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Khaki')->first()->id,
            'quantity' => 11
        ]);

        //Petal : Qty: 7
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Petal')->first()->id,
            'quantity' => 7
        ]);

        //Blue Mint : Qty: 17
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Blue Mint')->first()->id,
            'quantity' => 16
        ]);

        //Pink : Qty: 11
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Pink')->first()->id,
            'quantity' => 27
        ]);

        //Biru Tua : Qty: 17
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Biru Tua')->first()->id,
            'quantity' => 15
        ]);

        //Cream : Qty: 8
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Cream')->first()->id,
            'quantity' => 14
        ]);
    }
}
