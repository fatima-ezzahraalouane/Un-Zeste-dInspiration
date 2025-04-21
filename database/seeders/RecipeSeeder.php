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
                'image' => 'salade-nicoise.jpg',
                'description' => 'Une salade fraîche typique du sud de la France.',
                'preparation_time' => 15,
                'cooking_time' => 0,
                'servings' => 2,
                'complexity' => 'Facile',
                'ingredients' => 'tomates, thon, œufs, haricots verts, olives',
                'instructions' => 'Couper les légumes, Mélanger avec le thon et les œufs',
                'category_id' => 1,
            ],
            [
                'title' => 'Tajine de poulet',
                'image' => 'tajine-poulet.jpg',
                'description' => 'Tajine traditionnel au citron confit et olives.',
                'preparation_time' => 20,
                'cooking_time' => 60,
                'servings' => 4,
                'complexity' => 'Moyen',
                'ingredients' => 'poulet, citron confit, olives, épices',
                'instructions' => 'Faire revenir le poulet, Ajouter les ingrédients et mijoter',
                'category_id' => 2,
            ],
            [
                'title' => 'Couscous royal',
                'image' => 'couscous.jpg',
                'description' => 'Plat marocain à base de semoule, légumes et viande.',
                'preparation_time' => 30,
                'cooking_time' => 90,
                'servings' => 6,
                'complexity' => 'Difficile',
                'ingredients' => 'semoule, agneau, poulet, légumes',
                'instructions' => 'Cuire les viandes, Préparer les légumes, Servir avec la semoule',
                'category_id' => 2,
            ],
            [
                'title' => 'Soupe de légumes',
                'image' => 'soupe-legumes.jpg',
                'description' => 'Soupe réconfortante à base de légumes frais.',
                'preparation_time' => 15,
                'cooking_time' => 30,
                'servings' => 4,
                'complexity' => 'Facile',
                'ingredients' => 'carottes, pommes de terre, oignons, courgettes',
                'instructions' => 'Faire revenir les légumes, Ajouter de l’eau et cuire',
                'category_id' => 1,
            ],
            [
                'title' => 'Quiche lorraine',
                'image' => 'quiche.jpg',
                'description' => 'Tarte salée aux lardons et à la crème.',
                'preparation_time' => 20,
                'cooking_time' => 35,
                'servings' => 6,
                'complexity' => 'Moyen',
                'ingredients' => 'pâte brisée, lardons, œufs, crème fraîche',
                'instructions' => 'Préparer la garniture, Cuire au four',
                'category_id' => 2,
            ],
            [
                'title' => 'Gâteau au chocolat',
                'image' => 'gateau-chocolat.jpg',
                'description' => 'Gâteau moelleux au chocolat noir.',
                'preparation_time' => 15,
                'cooking_time' => 25,
                'servings' => 8,
                'complexity' => 'Facile',
                'ingredients' => 'chocolat, beurre, farine, œufs, sucre',
                'instructions' => 'Faire fondre le chocolat, Mélanger les ingrédients, Cuire au four',
                'category_id' => 3,
            ],
            [
                'title' => 'Crêpes sucrées',
                'image' => 'crepes.jpg',
                'description' => 'Crêpes fines à garnir selon vos envies.',
                'preparation_time' => 10,
                'cooking_time' => 20,
                'servings' => 6,
                'complexity' => 'Facile',
                'ingredients' => 'farine, lait, œufs, sucre, beurre',
                'instructions' => 'Préparer la pâte, Cuire les crêpes dans une poêle',
                'category_id' => 3,
            ],
            [
                'title' => 'Tiramisu',
                'image' => 'tiramisu.jpg',
                'description' => 'Dessert italien à base de mascarpone et café.',
                'preparation_time' => 25,
                'cooking_time' => 0,
                'servings' => 6,
                'complexity' => 'Moyen',
                'ingredients' => 'mascarpone, café, biscuits, œufs, sucre',
                'instructions' => 'Préparer la crème, Monter le dessert en couches, Réfrigérer',
                'category_id' => 3,
            ],
            [
                'title' => 'Gratin dauphinois',
                'image' => 'gratin.jpg',
                'description' => 'Plat de pommes de terre à la crème et au fromage.',
                'preparation_time' => 15,
                'cooking_time' => 60,
                'servings' => 4,
                'complexity' => 'Moyen',
                'ingredients' => 'pommes de terre, crème, fromage râpé, ail',
                'instructions' => 'Couper les pommes de terre, Cuire au four avec crème et fromage',
                'category_id' => 2,
            ],
            [
                'title' => 'Velouté de potiron',
                'image' => 'veloute.jpg',
                'description' => 'Soupe douce à base de potiron.',
                'preparation_time' => 10,
                'cooking_time' => 30,
                'servings' => 4,
                'complexity' => 'Facile',
                'ingredients' => 'potiron, oignon, crème, beurre',
                'instructions' => 'Faire revenir les légumes, Mixer avec de la crème',
                'category_id' => 1,
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
