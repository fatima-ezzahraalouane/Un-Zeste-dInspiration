<?php

namespace App\Repositories\Recipe;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeRepository implements RecipeRepositoryInterface
{
    public function index()
    {
        return Recipe::with('category', 'tags')->get();
    }

    public function store(Request $request)
    {
        $recipe = Recipe::create($request->only([
            'title',
            'image',
            'description',
            'preparation_time',
            'cooking_time',
            'servings',
            'complexity',
            'ingredients',
            'instructions',
            'category_id',
            'chef_id' => auth()->user()->chef->id
        ]));

        if ($request->has('tags')) {
            $recipe->tags()->sync($request->tags);
        }

        return $recipe;
    }

    public function show($id)
    {
        return Recipe::with('category', 'tags')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->update($request->only([
            'title',
            'image',
            'description',
            'preparation_time',
            'cooking_time',
            'servings',
            'complexity',
            'ingredients',
            'instructions',
            'category_id'
        ]));

        if ($request->has('tags')) {
            $recipe->tags()->sync($request->tags);
        }

        return $recipe;
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->tags()->detach();
        $recipe->delete();
        return true;
    }

    // public function getMostLikedRecipes()
    // {
    //     return Recipe::withCount('favoritedBy')
    //         ->orderByDesc('favorited_by_count')
    //         ->get();
    // }

    public function getMostLikedRecipes(int $limit)
    {
        return Recipe::with('chef.user')
            ->withCount('favoritedBy')
            ->orderByDesc('favorited_by_count')
            ->take($limit)
            ->get();
    }
}
