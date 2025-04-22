<?php

namespace App\Repositories\Favorite;

use Illuminate\Http\Request;

interface FavoriteRepositoryInterface
{
    public function store(Request $request);
    public function destroy(Request $request);
}
