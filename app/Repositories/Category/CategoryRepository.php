<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        return Category::create($request->validated());
    }

    public function update(Request $request, int $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());
        return $category;
    }

    public function delete(int $id)
    {
        $category = Category::findOrFail($id);
        return $category->delete();
    }

    public function findById(int $id)
    {
        return Category::findOrFail($id);
    }
}
