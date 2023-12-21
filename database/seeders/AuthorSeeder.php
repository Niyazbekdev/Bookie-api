<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{

    public function run(): void
    {
        Author::create([
            'name' => 'Ibrayım Yusupov',
            'slug' => 'ibrayim-yusupov',
        ]);

        Author::create([
            'name' => 'T. Qanaatov, B. Nadırov',
            'slug' => 't-qanaatov-b-nadirov',
        ]);

        Author::create([
            'name' => 'Xalıq awızeki dóretpeleri',
            'slug' => 'xaliq-awizeki-doretpeleri',
        ]);

        Author::create([
            'name' => 'Uolter Ayzekson',
            'slug' => 'uolter-ayzekson',
        ]);

        Author::create([
            'name' => 'Shıńǵıs Aytmatov',
            'slug' => 'shinis-aytmatov',
        ]);

        Author::create([
            'name' => 'Ótkir Hoshimov',
            'slug' => 'otkir-hoshimov',
        ]);
    }
}
