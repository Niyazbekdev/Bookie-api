<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            AuthorSeeder::class,
            NarratorSeeder::class,
            BookSeeder::class,
            ReviewSeeder::class,
            PaymentSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
