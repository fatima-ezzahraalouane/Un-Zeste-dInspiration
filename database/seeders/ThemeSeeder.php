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
                'image' => 'https://resize.elle.fr/article_1280/var/plain_site/storage/images/elle-a-table/les-dossiers-de-la-redaction/news-de-la-redaction/recettes-faciles-cuisine-marocaine-4173785/100676152-1-fre-FR/Cuisine-marocaine-5-recettes-pour-s-y-mettre.jpg',
                'description' => 'Découvrez les saveurs traditionnelles du Maroc.'
            ],
            [
                'name' => 'Pâtisserie Française',
                'image' => 'https://www.centre-europeen-formation.fr/wp-content/uploads/2020/10/patisseries-en-france.jpg',
                'description' => 'Savourez les douceurs de la pâtisserie française.'
            ],
            [
                'name' => 'Street Food Internationale',
                'image' => 'https://m.media-amazon.com/images/I/8189CrpqsTL._AC_UF1000,1000_QL80_.jpg',
                'description' => 'Une aventure gustative autour du monde.'
            ],
            [
                'name' => 'Cuisine Végétarienne',
                'image' => 'https://m1.zeste.ca/serdy-m-dia-inc/image/upload/f_auto/fl_lossy/q_auto:eco/x_0,y_93,w_5000,h_2812,c_crop/w_1200,h_630,c_scale/v1608657295/foodlavie/prod/dossiers/cuisine-vegetarienne-1-3356821c',
                'description' => 'Des plats sains, gourmands et sans viande.'
            ],
        ];

    
        foreach ($themes as $theme) {
            Theme::create($theme);
        }
    }
}
