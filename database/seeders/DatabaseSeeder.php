<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        $this->call(AdminSeeder::class);
        $this->call(GourmandSeeder::class);
        $this->call(ChefSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(RecipeSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(RecipeTagSeeder::class);
        $this->call(FavoriteSeeder::class);
        $this->call(ThemeSeeder::class);
    }
}
