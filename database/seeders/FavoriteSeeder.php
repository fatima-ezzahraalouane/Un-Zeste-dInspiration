<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Recipe;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // On récupère un utilisateur gourmand existant
        $gourmand = User::whereHas('role', function ($query) {
            $query->where('name_user', 'Gourmand');
        })->first();

        // On récupère les 3 premières recettes
        $recipes = Recipe::take(5)->get();

        // On ajoute ces recettes en favoris
        foreach ($recipes as $recipe) {
            DB::table('favorites')->insert([
                'gourmand_id' => 1,
                'recipe_id' => $recipe->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
