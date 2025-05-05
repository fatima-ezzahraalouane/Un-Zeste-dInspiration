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
        return redirect()->back()->with('success', 'Votre recette a été soumise pour validation et sera approuvée par un administrateur.');
    }

    public function show($id)
    {
        $recipe = $this->recipeRepo->show($id);
        $carouselRecipes = $this->recipeRepo->getMostLikedRecipes(3);
        return view('gourmand.recette-detail', compact('recipe', 'carouselRecipes'));
    }

    public function update(UpdateRecipeRequest $request, $id)
    {
        $this->recipeRepo->update($request, $id);
        return redirect()->back()->with('success', 'Votre recette a été mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $this->recipeRepo->destroy($id);
        return redirect()->back()->with('success', 'Votre recette a été supprimée avec succès.');
    }

    public function browse(Request $request)
    {
        $recipes = $this->recipeRepo->search($request);
        $categories = $this->categoryRepo->getAll();
        $tags = $this->tagRepo->getAll();

        $likedRecipes = [];
        if (Auth::check() && Auth::user()->role->name_user === 'Gourmand' && Auth::user()->gourmand) {
            $likedRecipes = Auth::user()->gourmand->favorites->pluck('id')->toArray();
        }

        return view('gourmand.recettes', compact('recipes', 'categories', 'tags', 'likedRecipes'));
    }
}
