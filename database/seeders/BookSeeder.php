<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{

    public function run(): void
    {
        Book::create([
            'title' => 'Tumaris',
            'description' =>'Xaliq dastani',
            'slug' => 'tumaris',
            'price' => '1700000',
            'language' => 'Qaraqalpaq',
            'category_id' => 1,
            'author_id' => 2,
            'narrator_id' => 1,
        ]);
    }
}
