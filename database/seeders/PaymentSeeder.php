<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{

    public function run(): void
    {
        Payment::create([
            'name' => 'Clikc Up',
        ]);

        Payment::create([
            'name' => 'Paynet',
        ]);

        Payment::create([
            'name' => 'Oson',
        ]);

        Payment::create([
            'name' => 'Paypal',
        ]);

    }
}
