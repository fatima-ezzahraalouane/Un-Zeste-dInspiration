<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        $recipes = [
            [
                'title' => 'Salade Niçoise',
                'image' => 'https://images.radio-canada.ca/q_auto,w_844/v1/alimentation/recette/16x9/salade-nicoise-haricots-thon.jpg',
                'video' => 'https://youtu.be/riszcI7BQvE?si=W0bfyscPtxmj4NQa',
                'description' => 'Une salade fraîche typique du sud de la France.',
                'statut' => 'Approuvé',
                'preparation_time' => 15,
                'cooking_time' => 0,
                'servings' => 2,
                'complexity' => 'Facile',
                'ingredients' => 'tomates, thon, œufs, haricots verts, olives',
                'instructions' => 'Couper les légumes, Mélanger avec le thon et les œufs',
                'category_id' => 1,
                'chef_id' => 1,
            ],
            [
                'title' => 'Tajine de poulet',
                'image' => 'https://images.radio-canada.ca/v1/alimentation/recette/4x3/tajine-poulet-soulard.jpg',
                'video' => 'https://youtu.be/nNCQYcf3mmY?si=GMkfCcPzTUFAW_6R',
                'description' => 'Tajine traditionnel au citron confit et olives.',
                'statut' => 'Approuvé',
                'preparation_time' => 20,
                'cooking_time' => 60,
                'servings' => 4,
                'complexity' => 'Moyen',
                'ingredients' => 'poulet, citron confit, olives, épices',
                'instructions' => 'Faire revenir le poulet, Ajouter les ingrédients et mijoter',
                'category_id' => 2,
                'chef_id' => 1,
            ],
            [
                'title' => 'Couscous royal',
                'image' => 'https://img.cuisineaz.com/660x495/2025/02/19/i203994-couscous-a-preparer-a-l-avance.jpg',
                'video' => 'https://youtu.be/Rsdmqa-yqV4?si=--ZcNbf_ocSVa1OO',
                'description' => 'Plat marocain à base de semoule, légumes et viande.',
                'statut' => 'Approuvé',
                'preparation_time' => 30,
                'cooking_time' => 90,
                'servings' => 6,
                'complexity' => 'Difficile',
                'ingredients' => 'semoule, agneau, poulet, légumes',
                'instructions' => 'Cuire les viandes, Préparer les légumes, Servir avec la semoule',
                'category_id' => 2,
                'chef_id' => 1,
            ],
            [
                'title' => 'Soupe de légumes',
                'image' => 'https://cdn.pratico-pratiques.com/app/uploads/sites/3/2018/08/20182515/soupe-aux-legumes-dautomne.jpeg',
                'video' => 'https://youtu.be/5PScv1ZWiTo?si=NWFgR5JQ-1MZ4wOa',
                'description' => 'Soupe réconfortante à base de légumes frais.',
                'statut' => 'En attente',
                'preparation_time' => 15,
                'cooking_time' => 30,
                'servings' => 4,
                'complexity' => 'Facile',
                'ingredients' => 'carottes, pommes de terre, oignons, courgettes',
                'instructions' => 'Faire revenir les légumes, Ajouter de l’eau et cuire',
                'category_id' => 1,
                'chef_id' => 1,
            ],
            [
                'title' => 'Quiche lorraine',
                'image' => 'https://simplyhomecooked.com/wp-content/uploads/2023/01/quiche-lorraine-recipe-19.jpg',
                'video' => 'https://youtu.be/naZgw-QJHMs?si=IUbX8Cp-ep_K-syt',
                'description' => 'Tarte salée aux lardons et à la crème.',
                'statut' => 'Approuvé',
                'preparation_time' => 20,
                'cooking_time' => 35,
                'servings' => 6,
                'complexity' => 'Moyen',
                'ingredients' => 'pâte brisée, lardons, œufs, crème fraîche',
                'instructions' => 'Préparer la garniture, Cuire au four',
                'category_id' => 2,
                'chef_id' => 1,
            ],
            [
                'title' => 'Gâteau au chocolat',
                'image' => 'https://cdn.pratico-pratiques.com/app/uploads/sites/3/2018/10/09152353/gateau-au-chocolat_pg.jpg',
                'video' => 'https://youtu.be/6wWKbajKxLw?si=5kVD6VnOoiv-84wS',
                'description' => 'Gâteau moelleux au chocolat noir.',
                'statut' => 'Approuvé',
                'preparation_time' => 15,
                'cooking_time' => 25,
                'servings' => 8,
                'complexity' => 'Facile',
                'ingredients' => 'chocolat, beurre, farine, œufs, sucre',
                'instructions' => 'Faire fondre le chocolat, Mélanger les ingrédients, Cuire au four',
                'category_id' => 3,
                'chef_id' => 1,
            ],
            [
                'title' => 'Crêpes sucrées',
                'image' => 'https://cuisinovores.com/wp-content/uploads/2024/10/photo_crepes_sucrees_cuisinovores-500x375.webp',
                'video' => 'https://youtu.be/Vdf1UuIpCik?si=8pN3PNtghjEhlXai',
                'description' => 'Crêpes fines à garnir selon vos envies.',
                'statut' => 'Approuvé',
                'preparation_time' => 10,
                'cooking_time' => 20,
                'servings' => 6,
                'complexity' => 'Facile',
                'ingredients' => 'farine, lait, œufs, sucre, beurre',
                'instructions' => 'Préparer la pâte, Cuire les crêpes dans une poêle',
                'category_id' => 3,
                'chef_id' => 1,
            ],
            [
                'title' => 'Tiramisu',
                'image' => 'https://www.galbani.fr/wp-content/uploads/2017/07/Galbani_Veritable_Tiramisu_opt2.jpg',
                'video' => 'https://youtu.be/7VTtenyKRg4?si=YL_T-U9gOItji3Hi',
                'description' => 'Dessert italien à base de mascarpone et café.',
                'statut' => 'Approuvé',
                'preparation_time' => 25,
                'cooking_time' => 0,
                'servings' => 6,
                'complexity' => 'Moyen',
                'ingredients' => 'mascarpone, café, biscuits, œufs, sucre',
                'instructions' => 'Préparer la crème, Monter le dessert en couches, Réfrigérer',
                'category_id' => 3,
                'chef_id' => 1,
            ],
            [
                'title' => 'Gratin dauphinois',
                'image' => 'https://iod.keplrstatic.com/api/ar_1,c_crop,g_north/c_fill,dpr_auto,f_auto,q_70,w_750/mon_marche/REC_Gratin_dauphinois_au_patates_douces.png',
                'video' => 'https://youtu.be/EBeZ3iogFzQ?si=7zxDachTcxYPTCYM',
                'description' => 'Plat de pommes de terre à la crème et au fromage.',
                'statut' => 'Approuvé',
                'preparation_time' => 15,
                'cooking_time' => 60,
                'servings' => 4,
                'complexity' => 'Moyen',
                'ingredients' => 'pommes de terre, crème, fromage râpé, ail',
                'instructions' => 'Couper les pommes de terre, Cuire au four avec crème et fromage',
                'category_id' => 2,
                'chef_id' => 1,
            ],
            [
                'title' => 'Velouté de potiron',
                'image' => 'https://assets.afcdn.com/recipe/20160330/15787_w1024h576c1cx2808cy1872.jpg',
                'video' => 'https://youtu.be/QytreTrjhYA?si=oyiAt5WrbmvYONlZ',
                'description' => 'Soupe douce à base de potiron.',
                'statut' => 'Approuvé',
                'preparation_time' => 10,
                'cooking_time' => 30,
                'servings' => 4,
                'complexity' => 'Facile',
                'ingredients' => 'potiron, oignon, crème, beurre',
                'instructions' => 'Faire revenir les légumes, Mixer avec de la crème',
                'category_id' => 1,
                'chef_id' => 1,
            ],
        ];

        foreach ($recipes as $recipe) {
            DB::table('recipes')->insert(array_merge($recipe, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
