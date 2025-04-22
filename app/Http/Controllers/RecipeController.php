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
}
