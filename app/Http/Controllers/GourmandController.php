<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Recipe\RecipeRepositoryInterface;
use App\Models\Recipe;
use App\Models\Chef;
use App\Models\User;
use App\Models\Experience;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gourmand\UpdateProfileRequest;

class GourmandController extends Controller
{
    protected $recipeRepo;

    public function __construct(RecipeRepositoryInterface $recipeRepo)
    {
        $this->recipeRepo = $recipeRepo;
    }

    public function index()
    {
        $recipes = $this->recipeRepo->getMostLikedRecipes(4);

        $stats = [
            'recipes' => Recipe::where('statut', 'Approuvé')->count(),
            'experiences' => Experience::where('statut', 'Approuvé')->count(),
            'chefs' => Chef::count(),
            'members' => User::whereHas('role', function ($q) {
                $q->where('name_user', 'Gourmand');
            })->count(),
        ];

        $likedRecipes = [];
        if (Auth::check() && Auth::user()->role->name_user === 'Gourmand' && Auth::user()->gourmand) {
            $likedRecipes = Auth::user()->gourmand->favorites->pluck('id')->toArray();
        }

        return view('gourmand.accueil', compact('recipes', 'stats', 'likedRecipes'));
    }

    public function profile()
    {
        $gourmand = Auth::user()->gourmand;

        if (!$gourmand) {
            abort(403, 'Accès non autorisé.');
        }

        $themes = Theme::all();
        $experiences = $gourmand->experiences()
            ->with('theme')
            ->latest()
            ->paginate(5);

        $stats = [
            'experiences' => $gourmand->experiences()->where('statut', 'Approuvé')->count(),
            'comments' => $gourmand->experiences()
                ->where('statut', 'Approuvé')
                ->withCount('comments')
                ->get()
                ->sum('comments_count'),
            'popularExperiences' => $gourmand->experiences()
                ->where('statut', 'Approuvé')
                ->withCount('comments')
                ->orderByDesc('comments_count')
                ->take(5)
                ->get(),
        ];

        return view('gourmand.profile', compact('gourmand', 'themes', 'experiences', 'stats'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $gourmand = $user->gourmand;

        $user->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'avatar'     => $request->avatar,
        ]);

        $gourmand->update([
            'adresse'    => $request->adresse,
            'biographie' => $request->biographie,
        ]);

        return redirect()->route('gourmand.profile')->with('success', 'Profil mis à jour avec succès.');
    }
}
