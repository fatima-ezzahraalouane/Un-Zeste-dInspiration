<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Theme;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themes = [
            [
                'name' => 'Cuisine Marocaine',
                'image' => 'https://via.placeholder.com/400x300?text=Marocaine',
                'description' => 'Découvrez les saveurs traditionnelles du Maroc.'
            ],
            [
                'name' => 'Pâtisserie Française',
                'image' => 'https://via.placeholder.com/400x300?text=Patissierie',
                'description' => 'Savourez les douceurs de la pâtisserie française.'
            ],
            [
                'name' => 'Street Food Internationale',
                'image' => 'https://via.placeholder.com/400x300?text=Street+Food',
                'description' => 'Une aventure gustative autour du monde.'
            ],
            [
                'name' => 'Cuisine Végétarienne',
                'image' => 'https://via.placeholder.com/400x300?text=Vegetarienne',
                'description' => 'Des plats sains, gourmands et sans viande.'
            ],
        ];

    
        foreach ($themes as $theme) {
            Theme::create($theme);
        }
    }
}
