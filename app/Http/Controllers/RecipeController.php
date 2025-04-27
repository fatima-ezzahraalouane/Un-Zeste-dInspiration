<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Recipe\StoreRecipeRequest;
use App\Http\Requests\Recipe\UpdateRecipeRequest;
use App\Repositories\Recipe\RecipeRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Tag\TagRepositoryInterface;
use Illuminate\Support\Facades\Auth;

use App\Models\Recipe;
use App\Models\Chef;
use App\Models\User;

use App\Models\Category;
use App\Models\Tag;

class RecipeController extends Controller
{
    protected $recipeRepo;
    protected $categoryRepo;
    protected $tagRepo;

    public function __construct(RecipeRepositoryInterface $recipeRepo, CategoryRepositoryInterface $categoryRepo, TagRepositoryInterface $tagRepo)
    {
        $this->recipeRepo = $recipeRepo;
        $this->categoryRepo = $categoryRepo;
        $this->tagRepo = $tagRepo;
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

    // top recettes pour le carrousel (composant)
    public function topForCarousel()
    {
        $recipes = $this->recipeRepo->getMostLikedRecipes(5);
        return view('components.carousel', compact('recipes'));
    }

    public function browse(Request $request)
    {
        $recipes = $this->recipeRepo->search($request);
        $categories = $this->categoryRepo->getAll();
        $tags = $this->tagRepo->all();

        $likedRecipes = [];
        if (Auth::check() && Auth::user()->role->name_user === 'Gourmand' && Auth::user()->gourmand) {
            $likedRecipes = Auth::user()->gourmand->favorites->pluck('id')->toArray();
        }

        return view('gourmand.recettes', compact('recipes', 'categories', 'tags', 'likedRecipes'));
    }
}
