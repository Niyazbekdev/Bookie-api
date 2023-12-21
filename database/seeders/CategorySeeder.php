<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        Category::create([
            'name' => 'Jáhán ádebiyatı',
            'slug' => 'jahan-adebiyati'
        ]);

        Category::create([
            'name' => 'Ózbek ádebiyatı',
            'slug' => 'ozbek-adebiyati',
        ]);

        Category::create([
            'name' => 'Qaraqalpaq ádebiyatı',
            'slug' => 'qaraqalpaq-adebiyati',
        ]);

        Category::create([
            'name' => 'Qaraqalpaq folklorı',
            'slug' => 'qaraqalpaq-folklori',
        ]);

        Category::create([
            'name' => 'Qısqa audiolar',
            'slug' => 'qisqa-audiolar',
        ]);
    }
}
