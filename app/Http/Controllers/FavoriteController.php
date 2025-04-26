<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Favorite\StoreFavoriteRequest;
use App\Http\Requests\Favorite\DeleteFavoriteRequest;
use App\Repositories\Favorite\FavoriteRepositoryInterface;
use Illuminate\Http\JsonResponse;

class FavoriteController extends Controller
{
    protected $favoriteRepo;

    public function __construct(FavoriteRepositoryInterface $favoriteRepo)
    {
        $this->favoriteRepo = $favoriteRepo;
    }

    public function store(StoreFavoriteRequest $request): JsonResponse
    {
        $this->favoriteRepo->store($request);

        return response()->json(['message' => 'Recette ajoutée aux favoris.']);
    }

    public function destroy(DeleteFavoriteRequest $request): JsonResponse
    {
        $this->favoriteRepo->destroy($request);

        return response()->json(['message' => 'Recette retirée des favoris.']);
    }
}
