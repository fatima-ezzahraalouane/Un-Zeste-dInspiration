<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Recipe\StoreRecipeRequest;
use App\Http\Requests\Recipe\UpdateRecipeRequest;
use App\Repositories\Recipe\RecipeRepositoryInterface;

class RecipeController extends Controller
{
    protected $recipeRepo;

    public function __construct(RecipeRepositoryInterface $recipeRepo)
    {
        $this->recipeRepo = $recipeRepo;
    }
}
