<?php

namespace App\Repositories\Category;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface
{
    public function getAll();
    public function store(StoreCategoryRequest $request);
    public function update(UpdateCategoryRequest $request, int $id);
    public function delete(int $id);
    public function findById(int $id);
}
