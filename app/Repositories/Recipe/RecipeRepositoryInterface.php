<?php
namespace App\Repositories\Recipe;

use Illuminate\Http\Request;

interface RecipeRepositoryInterface
{
    public function index();
    public function store(Request $request);
    public function show($id);
    public function update(Request $request, $id);
    public function destroy($id);
}
