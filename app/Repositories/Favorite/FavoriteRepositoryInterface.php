<?php

namespace App\Repositories\Favorite;

use Illuminate\Http\Request;
use App\Http\Requests\Favorite\DeleteFavoriteRequest;
use App\Http\Requests\Favorite\StoreFavoriteRequest;

interface FavoriteRepositoryInterface
{
    public function store(StoreFavoriteRequest $request);
    public function destroy(DeleteFavoriteRequest $request);
}
