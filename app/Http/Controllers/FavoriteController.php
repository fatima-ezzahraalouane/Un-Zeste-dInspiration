<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Favorite\StoreFavoriteRequest;
use App\Http\Requests\Favorite\DeleteFavoriteRequest;
use App\Repositories\Favorite\FavoriteRepositoryInterface;

class FavoriteController extends Controller
{
    protected $favoriteRepo;

    public function __construct(FavoriteRepositoryInterface $favoriteRepo)
    {
        $this->favoriteRepo = $favoriteRepo;
    }

    public function store(StoreFavoriteRequest $request)
    {
        $this->favoriteRepo->store($request);
        return back()->with('success', 'Recette ajoutée avec succès !');
    }

    public function destroy(DeleteFavoriteRequest $request)
    {
        $this->favoriteRepo->destroy($request);

        return back()->with('success', 'Recette retirée des favoris');
    }
}
