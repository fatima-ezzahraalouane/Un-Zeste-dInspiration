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
                'image' => 'https://www.essaouiratour.com/upload/tajine-boeuf-pruneaux-2.jpg',
                'description' => 'Une expérience authentique de préparation de Tagine marocain.',
                'theme_id' => 1,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Secrets de la Pâtisserie Française',
                'image' => 'https://jaime-patisser.com/cdn/shop/articles/67a50d88eb99d1738870152_1024x.webp?v=1738881226',
                'description' => 'Découverte des bases de la pâtisserie classique.',
                'theme_id' => 2,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Voyage Street Food Bangkok',
                'image' => 'https://i.f1g.fr/media/madame/1200x630_crop/sites/default/files/img/2016/02/bangkok-street-food-voyage-tourisme.jpg',
                'description' => 'Découverte des saveurs thaïlandaises en mode street food.',
                'theme_id' => 3,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Cuisine Végétarienne Express',
                'image' => 'https://img.over-blog-kiwi.com/0/94/02/18/20181018/ob_c03111_3031-chili-sin-carne.jpg',
                'description' => 'Des plats végétariens faciles et rapides à préparer.',
                'theme_id' => 4,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Couscous Royal Maison',
                'image' => 'https://resize.elle.fr/original/var/plain_site/storage/images/elle-a-table/les-dossiers-de-la-redaction/news-de-la-redaction/recette-couscous-royal-maison-3971641/95716125-1-fre-FR/Le-couscous-royal-maison-l-une-des-recettes-preferees-des-Francais.jpg',
                'description' => 'Préparation complète du couscous traditionnel.',
                'theme_id' => 1,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Baguette Artisanale',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1j4fo6OKV7l8IH8AsJ_wpqI1OqoWApu6PDw&s',
                'description' => 'Secrets pour réussir une baguette comme un boulanger.',
                'theme_id' => 2,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Tacos Mexicains Maison',
                'image' => 'https://toupargel.fr/wp-content/uploads/2024/06/tacos-mexicain.jpeg',
                'description' => 'La fabrication authentique des tacos maison.',
                'theme_id' => 3,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Cuisine Vegan Débutant',
                'image' => 'https://www.mavieencouleurs.fr/sites/default/files/styles/max_1300x1300/public/2022-10/header_vegetarien.png.webp?itok=yiXmNP3a',
                'description' => 'Découverte de plats simples et savoureux sans produits animaux.',
                'theme_id' => 4,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Pastilla Sucrée Salée',
                'image' => 'https://cache.marieclaire.fr/data/photo/w1200_h630_ci/1mo/recettes-pastilla-maison.jpg',
                'description' => 'La fameuse Pastilla marocaine expliquée étape par étape.',
                'theme_id' => 1,
                'gourmand_id' => 1,
                'statut' => 'Approuver',
            ],
            [
                'title' => 'Atelier Chocolat Maison',
                'image' => 'https://fribourg.ch/wp-content/uploads/2022/09/53939948244_1ccce3dd85_c.jpg',
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
