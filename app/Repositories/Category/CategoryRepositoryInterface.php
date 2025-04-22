<?php

namespace App\Repositories\Category;

use Illuminate\Http\Request;

interface CategoryRepositoryInterface
{
    public function getAll();
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function delete(int $id);
    public function findById(int $id);
}
