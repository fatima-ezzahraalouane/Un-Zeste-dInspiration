<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Recipe\RecipeRepositoryInterface;
use App\Models\Recipe;
use App\Models\Chef;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GourmandController extends Controller
{
    protected $recipeRepo;

    public function __construct(RecipeRepositoryInterface $recipeRepo)
    {
        $this->recipeRepo = $recipeRepo;
    }

    public function index()
    {
        $recipes = $this->recipeRepo->getMostLikedRecipes(4);

        $stats = [
            'recipes' => Recipe::count(),
            'experiences' => 0,
            'chefs' => Chef::count(),
            'members' => User::whereHas('role', function ($q) {
                $q->where('name_user', 'Gourmand');
            })->count(),
        ];

        $likedRecipes = [];
        if (Auth::check() && Auth::user()->role->name_user === 'Gourmand' && Auth::user()->gourmand) {
            $likedRecipes = Auth::user()->gourmand->favorites->pluck('id')->toArray();
        }

        return view('gourmand.accueil', compact('recipes', 'stats', 'likedRecipes'));
    }
}
