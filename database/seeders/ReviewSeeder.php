<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{

    public function run(): void
    {
        Review::create([
            'user_id' => 2,
            'book_id' => 1,
            'text' => 'qalay aman saw',
            'rating' => 3,
        ]);
    }
}
