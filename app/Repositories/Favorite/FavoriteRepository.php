<?php

namespace App\Repositories\Favorite;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Requests\Favorite\DeleteFavoriteRequest;
use App\Http\Requests\Favorite\StoreFavoriteRequest;

class FavoriteRepository implements FavoriteRepositoryInterface
{
    public function store(StoreFavoriteRequest $request)
    {
        Favorite::firstOrCreate([
            'gourmand_id' => $request->user()->gourmand->id,
            'recipe_id' => $request->recipe_id
        ]);
    }

    public function destroy(DeleteFavoriteRequest $request)
    {
        Favorite::where('gourmand_id', $request->user()->gourmand->id)
                ->where('recipe_id', $request->recipe_id)
                ->delete();
    }
}
