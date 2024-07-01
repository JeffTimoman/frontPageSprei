<?php

namespace Database\Seeders;

use App\Models\Departement;
use App\Models\Product;
use App\Models\ProductDepartement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Departement : PPTI 20
        $departement = Departement::where('name', 'PPTI 20')->first();
        //Khaki : Qty: 12
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Khaki')->first()->id,
            'quantity' => 12
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
            'quantity' => 17
        ]);

        //Pink : Qty: 11
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Pink')->first()->id,
            'quantity' => 11
        ]);

        //Biru Tua : Qty: 17
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Biru Tua')->first()->id,
            'quantity' => 17
        ]);

        //Cream : Qty: 8
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Cream')->first()->id,
            'quantity' => 8
        ]);

        //Departement : PPTI 21
        $departement = Departement::where('name', 'PPTI 21')->first();

        //Khaki : Qty: 12
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Khaki')->first()->id,
            'quantity' => 12
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
            'quantity' => 17
        ]);

        //Pink : Qty: 11
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Pink')->first()->id,
            'quantity' => 11
        ]);

        //Biru Tua : Qty: 17
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Biru Tua')->first()->id,
            'quantity' => 17
        ]);

        //Cream : Qty: 8
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Cream')->first()->id,
            'quantity' => 8
        ]);

        //Departement : PPTI 22
        $departement = Departement::where('name', 'PPTI 22')->first();

        //Khaki : Qty: 12
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Khaki')->first()->id,
            'quantity' => 12
        ]);

        //Petal : Qty: 7
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Petal')->first()->id,
            'quantity' => 7
        ]);

        //Blue Mint : Qty: 16
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Blue Mint')->first()->id,
            'quantity' => 16
        ]);

        //Pink : Qty: 12
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Pink')->first()->id,
            'quantity' => 12
        ]);

        //Biru Tua : Qty: 16
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Biru Tua')->first()->id,
            'quantity' => 16
        ]);

        //Cream : Qty: 8
        ProductDepartement::create([
            'departement_id' => $departement->id,
            'product_id' => Product::where('name', 'Cream')->first()->id,
            'quantity' => 9
        ]);

        // $departement = Departement::where('name', 'ADMIN')->first();

        // //Khaki : Qty: 12
        // ProductDepartement::create([
        //     'departement_id' => $departement->id,
        //     'product_id' => Product::where('name', 'Khaki')->first()->id,
        //     'quantity' => 2
        // ]);

        // //Petal : Qty: 7
        // ProductDepartement::create([
        //     'departement_id' => $departement->id,
        //     'product_id' => Product::where('name', 'Petal')->first()->id,
        //     'quantity' => 2
        // ]);

        // //Blue Mint : Qty: 16
        // ProductDepartement::create([
        //     'departement_id' => $departement->id,
        //     'product_id' => Product::where('name', 'Blue Mint')->first()->id,
        //     'quantity' => 2
        // ]);

        //Pink : Qty: 10
        // ProductDepartement::create([
        //     'departement_id' => $departement->id,
        //     'product_id' => Product::where('name', 'Pink')->first()->id,
        //     'quantity' => 10
        // ]);

        // //Biru Tua : Qty: 16
        // ProductDepartement::create([
        //     'departement_id' => $departement->id,
        //     'product_id' => Product::where('name', 'Biru Tua')->first()->id,
        //     'quantity' => 16
        // ]);

        // //Cream : Qty: 8
        // ProductDepartement::create([
        //     'departement_id' => $departement->id,
        //     'product_id' => Product::where('name', 'Cream')->first()->id,
        //     'quantity' => 9
        // ]);

        //Departement FRONTPAGE
        // $departement = Departement::where('name', 'FRONTPAGE')->first();
        // //Khaki : Qty: 12
        // ProductDepartement::create([
        //     'departement_id' => $departement->id,
        //     'product_id' => Product::where('name', 'Khaki')->first()->id,
        //     'quantity' => 8
        // ]);

        // //Petal : Qty: 7
        // ProductDepartement::create([
        //     'departement_id' => $departement->id,
        //     'product_id' => Product::where('name', 'Petal')->first()->id,
        //     'quantity' => 8
        // ]);

        // //Blue Mint : Qty: 16
        // ProductDepartement::create([
        //     'departement_id' => $departement->id,
        //     'product_id' => Product::where('name', 'Blue Mint')->first()->id,
        //     'quantity' => 8
        // ]);

        // // Pink : Qty: 10
        // ProductDepartement::create([
        //     'departement_id' => $departement->id,
        //     'product_id' => Product::where('name', 'Pink')->first()->id,
        //     'quantity' => 8
        // ]);

        // //Biru Tua : Qty: 16
        // ProductDepartement::create([
        //     'departement_id' => $departement->id,
        //     'product_id' => Product::where('name', 'Biru Tua')->first()->id,
        //     'quantity' => 8
        // ]);

        // //Cream : Qty: 8
        // ProductDepartement::create([
        //     'departement_id' => $departement->id,
        //     'product_id' => Product::where('name', 'Cream')->first()->id,
        //     'quantity' => 8
        // ]);
    }
}
