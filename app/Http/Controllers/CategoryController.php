<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return view('categories.index', compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->categoryRepository->store($request);
        return back()->with('success', 'Catégorie ajoutée avec succès !');
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $this->categoryRepository->update($request, $id);
        return back()->with('success', 'Catégorie modifiée.');
    }
}
