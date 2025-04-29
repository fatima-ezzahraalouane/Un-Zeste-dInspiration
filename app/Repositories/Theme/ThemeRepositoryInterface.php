<?php

namespace App\Repositories\Theme;

use Illuminate\Http\Request;
use App\Http\Requests\Theme\StoreThemeRequest;
use App\Http\Requests\Theme\UpdateThemeRequest;

interface ThemeRepositoryInterface
{
    public function getAll();
    public function browse();
    public function store(StoreThemeRequest $request);
    public function update(UpdateThemeRequest $request, $id);
    public function destroy($id);
}
