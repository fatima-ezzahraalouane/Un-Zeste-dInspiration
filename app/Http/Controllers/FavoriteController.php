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

    public function index()
    {
        $gourmand = auth()->user()->gourmand;

        if (!$gourmand) {
            abort(403, 'Accès non autorisé.');
        }

        $recipes = $gourmand->favorites()->paginate(5);

        return view('gourmand.mesfavoris', compact('recipes'));
    }

    public function store(StoreFavoriteRequest $request)
    {
        $this->favoriteRepo->store($request);
        return redirect()->back()->with('success', 'Recette ajoutée aux favoris.');
    }

    public function destroy(DeleteFavoriteRequest $request)
    {
        $this->favoriteRepo->destroy($request);
        return redirect()->back()->with('success', 'Recette retirée des favoris.');
    }
}
