<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Recipe\StoreRecipeRequest;
use App\Http\Requests\Recipe\UpdateRecipeRequest;
use App\Repositories\Recipe\RecipeRepositoryInterface;

use App\Models\Recipe;
use App\Models\Chef;
use App\Models\User;

class RecipeController extends Controller
{
    protected $recipeRepo;

    public function __construct(RecipeRepositoryInterface $recipeRepo)
    {
        $this->recipeRepo = $recipeRepo;
    }

    public function index()
    {
        $this->recipeRepo->index();
    }

    public function store(StoreRecipeRequest $request)
    {
        $this->recipeRepo->store($request);
    }

    public function show($id)
    {
        return $this->recipeRepo->show($id);
    }

    public function update(UpdateRecipeRequest $request, $id)
    {
        return $this->recipeRepo->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->recipeRepo->destroy($id);
    }

    // top recettes pour la page d'accueil du visiteur
    public function topForVisiteur()
    {
        $recipes = $this->recipeRepo->getMostLikedRecipes(3);

        $stats = [
            'recipes' => Recipe::count(),
            'experiences' => 0,
            'chefs' => Chef::count(),
            'members' => User::whereHas('role', function ($q) {
                $q->where('name_user', 'Gourmand');
            })->count(),
        ];

        return view('visiteur', compact('recipes', 'stats'));
    }

    // top recettes pour la page d'accueil du gourmand
    public function topForGourmand()
    {
        $recipes = $this->recipeRepo->getMostLikedRecipes(4);
        return view('gourmand.accueil', compact('recipes'));
    }

    // top recettes pour le carrousel (composant)
    public function topForCarousel()
    {
        $recipes = $this->recipeRepo->getMostLikedRecipes(5);
        return view('components.carousel', compact('recipes'));
    }
}
