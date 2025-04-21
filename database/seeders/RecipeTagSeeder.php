<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeTagSeeder extends Seeder
{
    public function run(): void
    {
        $tagAssignments = [
            ['recipe_id' => 1, 'tag_ids' => [2, 3]], // Salade Niçoise : Végétarien, Rapide
            ['recipe_id' => 2, 'tag_ids' => [1, 4]], // Tajine de poulet : Épicé, Sans gluten
            ['recipe_id' => 3, 'tag_ids' => [4, 5]], // Couscous : Sans gluten, Fait maison
            ['recipe_id' => 4, 'tag_ids' => [2, 6]], // Soupe de légumes : Végétarien, Healthy
            ['recipe_id' => 5, 'tag_ids' => [3, 5]], // Quiche lorraine : Rapide, Fait maison
            ['recipe_id' => 6, 'tag_ids' => [3, 5]], // Gâteau au chocolat : Rapide, Fait maison
            ['recipe_id' => 7, 'tag_ids' => [3, 2]], // Crêpes sucrées : Rapide, Végétarien
            ['recipe_id' => 8, 'tag_ids' => [5, 4]], // Tiramisu : Fait maison, Sans gluten
            ['recipe_id' => 9, 'tag_ids' => [2, 5]], // Gratin dauphinois : Végétarien, Fait maison
            ['recipe_id' => 10, 'tag_ids' => [2, 6]], // Velouté de potiron : Végétarien, Healthy
        ];

        foreach ($tagAssignments as $assignment) {
            foreach ($assignment['tag_ids'] as $tag_id) {
                DB::table('recipe_tag')->insert([
                    'recipe_id' => $assignment['recipe_id'],
                    'tag_id' => $tag_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
