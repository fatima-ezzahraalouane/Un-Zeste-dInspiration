<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $categories = $this->categoryRepo->getAll();
        return view('categories.index', compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->categoryRepo->store($request);
        return back()->with('success', 'Catégorie ajoutée avec succès !');
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $this->categoryRepo->update($request, $id);
        return back()->with('success', 'Catégorie modifiée.');
    }

    public function destroy($id)
    {
        $this->categoryRepo->delete($id);
        return back()->with('success', 'Catégorie supprimée.');
    }
}
