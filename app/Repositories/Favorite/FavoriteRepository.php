<?php

namespace App\Repositories;

use App\Models\Favorite;
use App\Repositories\Favorite\FavoriteRepositoryInterface;
use Illuminate\Http\Request;

class FavoriteRepository implements FavoriteRepositoryInterface
{
    public function store(Request $request)
    {
        Favorite::firstOrCreate([
            'gourmand_id' => $request->user()->gourmand->id,
            'recipe_id' => $request->recipe_id
        ]);
    }

    public function destroy(Request $request)
    {
        Favorite::where('gourmand_id', $request->user()->gourmand->id)
                ->where('recipe_id', $request->recipe_id)
                ->delete();
    }
}
