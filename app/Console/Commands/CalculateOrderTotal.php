<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;

class CalculateOrderTotal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:calculate-total';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate the total cost of all orders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $totalCost = Order::with('orderLines.product')->get()->sum(function ($order) {
            return $order->orderLines->sum(function ($line) {
                return $line->qty * $line->product->cost;
            });
        });
        echo ("Total cost of all orders: $totalCost \n");
        return true;
    }
}
