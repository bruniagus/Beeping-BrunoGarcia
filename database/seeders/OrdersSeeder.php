<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 20 registros de "orders" con sus "lines"
        for ($i = 1; $i <= 20; $i++) {
            $order = \App\Models\Order::create([
                'order_ref' => 'OrderRef-' . $i,
                'customer_name' => 'Customer-' . $i,
            ]);
    
            // Crear líneas de orden para cada orden
            for ($j = 1; $j <= rand(1, 5); $j++) {
                $product = \App\Models\Product::inRandomOrder()->first();
                
                \App\Models\OrderLine::create([
                    'order_id' => $order->id,
                    'qty' => rand(1, 10),
                    'product_id' => $product->id,
                ]);
            }
        }
    }
}
