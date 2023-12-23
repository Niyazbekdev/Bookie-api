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
            'slug' => 'tumaris-qaraqalpaqlar-ózleriniń-kelip',
            'price' => '1700000',
            'language' => 'Qaraqalpaq',
            'category_id' => 1,
            'author_id' => 2,
            'narrator_id' => 1,
        ]);
    }
}
