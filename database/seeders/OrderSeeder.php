<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{

    public function run(): void
    {
        Order::create([
            'payment_id' => 1,
            'user_id' => 3,
            'amount' => 500000,
            'is_paid' => false,
        ]);
    }
}
