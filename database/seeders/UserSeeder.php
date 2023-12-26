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
            'name' => 'Anvar Saburov',
            'phone' => '+998907094839',
            'password' => Hash::make('123'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Dastan Bektursinov',
            'phone' => '+998918093829',
            'password' => Hash::make('123'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Aziz Rametov',
            'phone' => '+998934589034',
            'password' => Hash::make('123'),
            'role_id' => 3,
        ]);
    }
}
