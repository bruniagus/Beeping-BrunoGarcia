<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 10 registros de "products"
        for ($i = 1; $i <= 10; $i++) {
            \App\Models\Product::create([
                'name' => 'Product-' . $i,
                'cost' => rand(10, 100),
            ]);
        }
    }
}
