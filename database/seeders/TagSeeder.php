<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tags')->insert([
            ['name' => 'Épicé', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Végétarien', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rapide', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sans gluten', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fait maison', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Healthy', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
