<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;
use App\Models\Chef;
use App\Models\User;
use App\Repositories\Recipe\RecipeRepositoryInterface;

class VisiteurController extends Controller
{
    protected $recipeRepo;

    public function __construct(RecipeRepositoryInterface $recipeRepo)
    {
        $this->recipeRepo = $recipeRepo;
    }

    public function index()
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
}
