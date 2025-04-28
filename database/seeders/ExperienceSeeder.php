<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experiences = [
            [
                'title' => 'Ma Première Tagine',
                'image' => 'https://via.placeholder.com/400x300?text=Tagine',
                'description' => 'Une expérience authentique de préparation de Tagine marocain.',
                'theme_id' => 1,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Secrets de la Pâtisserie Française',
                'image' => 'https://via.placeholder.com/400x300?text=Patissierie',
                'description' => 'Découverte des bases de la pâtisserie classique.',
                'theme_id' => 2,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Voyage Street Food Bangkok',
                'image' => 'https://via.placeholder.com/400x300?text=Street+Food',
                'description' => 'Découverte des saveurs thaïlandaises en mode street food.',
                'theme_id' => 3,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Cuisine Végétarienne Express',
                'image' => 'https://via.placeholder.com/400x300?text=Vegetarienne',
                'description' => 'Des plats végétariens faciles et rapides à préparer.',
                'theme_id' => 4,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Couscous Royal Maison',
                'image' => 'https://via.placeholder.com/400x300?text=Couscous',
                'description' => 'Préparation complète du couscous traditionnel.',
                'theme_id' => 1,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Baguette Artisanale',
                'image' => 'https://via.placeholder.com/400x300?text=Baguette',
                'description' => 'Secrets pour réussir une baguette comme un boulanger.',
                'theme_id' => 2,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Tacos Mexicains Maison',
                'image' => 'https://via.placeholder.com/400x300?text=Tacos',
                'description' => 'La fabrication authentique des tacos maison.',
                'theme_id' => 3,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Cuisine Vegan Débutant',
                'image' => 'https://via.placeholder.com/400x300?text=Vegan',
                'description' => 'Découverte de plats simples et savoureux sans produits animaux.',
                'theme_id' => 4,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Pastilla Sucrée Salée',
                'image' => 'https://via.placeholder.com/400x300?text=Pastilla',
                'description' => 'La fameuse Pastilla marocaine expliquée étape par étape.',
                'theme_id' => 1,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Atelier Chocolat Maison',
                'image' => 'https://via.placeholder.com/400x300?text=Chocolat',
                'description' => 'Créer ses propres chocolats maison facilement.',
                'theme_id' => 2,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }
}
