<?php

namespace App\Repositories\Recipe;

use App\Models\Recipe;
use Illuminate\Http\Request;

use App\Http\Requests\Recipe\StoreRecipeRequest;
use App\Http\Requests\Recipe\UpdateRecipeRequest;

class RecipeRepository implements RecipeRepositoryInterface
{
    public function index()
    {
        return Recipe::with('category', 'tags')->get();
    }

    public function store(StoreRecipeRequest $request)
    {
        $data = $request->validated();

        $data['chef_id'] = auth()->user()->chef->id;
        $data['statut'] = 'En attente';

        $recipe = Recipe::create($data);

        if ($request->has('tags')) {
            $recipe->tags()->sync($request->tags);
        }

        return $recipe;
    }

    public function show($id)
    {
        return Recipe::with('category', 'tags')->findOrFail($id);
    }

    public function update(UpdateRecipeRequest $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->update($request->validated());

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

    public function getMostLikedRecipes(int $limit)
    {
        return Recipe::with('chef.user')
            ->where('statut', 'Approuver')
            ->withCount('favoritedBy')
            ->orderByDesc('favorited_by_count')
            ->take($limit)
            ->get();
    }

    public function search(Request $request)
    {
        $query = Recipe::with(['category', 'tags', 'chef.user'])
            ->where('statut', 'Approuver');

        // Recherche par titre
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Filtrer par catégorie
        if ($request->filled('category_id') && $request->category_id != 'all') {
            $query->where('category_id', $request->category_id);
        }

        // Filtrer par tag
        if ($request->filled('tag_id') && $request->tag_id != 'all') {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('tag_id', $request->tag_id);
            });
        }

        // Choix de la pagination
        $perPage = $request->input('per_page', 5);

        return $query->paginate($perPage);
    }
}
