<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $product = \App\Models\Product\Product::create([
             'name' => 'Burger'
         ]);

        $ingredients = [
            [
                'name' => 'Beef',
                'weight' => 'kg',
                'consumes' => 0.15,
                'main_stock' => 20,
                'current_stock' => 20
            ],
            [
                'name' => 'Cheese',
                'weight' => 'kg',
                'consumes' => 0.03,
                'main_stock' => 5,
                'current_stock' => 5
            ],
            [
                'name' => 'Onion',
                'weight' => 'kg',
                'consumes' => 0.02,
                'main_stock' => 1,
                'current_stock' => 1
            ]
        ];

        foreach ($ingredients as $ingredient) {
            $ingredient['product_id'] = $product->id;
            \App\Models\Product\ProductIngredient::create($ingredient);
        }
    }
}
