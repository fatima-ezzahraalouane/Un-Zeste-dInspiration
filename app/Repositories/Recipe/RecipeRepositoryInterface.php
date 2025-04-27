<?php
namespace App\Repositories\Recipe;

use Illuminate\Http\Request;
use App\Http\Requests\Recipe\StoreRecipeRequest;
use App\Http\Requests\Recipe\UpdateRecipeRequest;

interface RecipeRepositoryInterface
{
    public function index();
    public function store(StoreRecipeRequest $request);
    public function show($id);
    public function update(UpdateRecipeRequest $request, $id);
    public function destroy($id);

    public function getMostLikedRecipes(int $limit);
    public function search(Request $request);
}
