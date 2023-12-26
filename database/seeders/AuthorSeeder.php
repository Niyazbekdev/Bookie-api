<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{

    public function run(): void
    {
        Author::create([
            'name' => 'Antuan de Sent-Ekzyuperi',
            'slug' => 'antuan-de-sent-ekzyuperi'
        ]);

        Author::create([
            'name' => 'Stendal',
            'slug' => 'stendal'
        ]);

        Author::create([
            'name' => 'Ótkir Hoshimov',
            'slug' => 'otkir-hoshimov'
        ]);

        Author::create([
            'name' => 'Odil Yoqubov',
            'slug' => 'odil-yoqubov'
        ]);

        Author::create([
            'name' => 'T. Qanaatov, B. Nadırov',
            'slug' => 't-qanaatov-b-nadirov'
        ]);

        Author::create([
            'name' => 'Ámet Shamuratov',
            'slug' => 'amet-shamuratov'
        ]);

        Author::create([
            'name' => 'Xalıq awızeki dóretpeleri',
            'slug' => 'xaliq-awizeki-doretpeleri'
        ]);
    }
}
