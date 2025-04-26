<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Recipe\RecipeRepositoryInterface;

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
        return view('gourmand.accueil', compact('recipes'));
    }
}
