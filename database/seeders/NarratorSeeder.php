<?php

namespace Database\Seeders;

use App\Models\Narrator;
use Illuminate\Database\Seeder;

class NarratorSeeder extends Seeder
{

    public function run(): void
    {
        Narrator::create([
            'name' => 'Baxtiyar Jumataev',
            'slug' => 'baxtiyar-jumataev',
        ]);

        Narrator::create([
            'name' => 'Azizbek Dabılov',
            'slug' => 'azizbek-dabilov',
        ]);

        Narrator::create([
            'name' => 'Dástan Baymurzaev',
            'slug' => 'dastan-baymurzaev',
        ]);
    }
}
