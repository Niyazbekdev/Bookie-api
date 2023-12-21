<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'name' => 'Johny Deep',
            'phone' => '+998907094839',
            'password' => Hash::make('123'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Max',
            'phone' => '+998918093829',
            'password' => Hash::make('123'),
            'role_id' => 2,
        ]);
    }
}
