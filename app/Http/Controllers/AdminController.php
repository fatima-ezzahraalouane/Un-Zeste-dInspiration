<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
use App\Models\Experience;
use App\Models\User;
use App\Models\Chef;
use App\Models\Gourmand;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $stats = [
            'recipes' => Recipe::where('statut', 'Approuver')->count(),
            'experiences' => Experience::where('statut', 'Approuver')->count(),
            'chefs' => Chef::count(),
            'gourmands' => Gourmand::count(),
        ];

        $categories = Category::withCount('recipes')->get();

        $topChefs = Chef::withCount(['recipes as approved_recipes_count' => function ($query) {
            $query->where('statut', 'Approuver');
        }])
            ->orderByDesc('approved_recipes_count')
            ->take(3)
            ->get();

        $topGourmands = Gourmand::withCount(['experiences as approved_experiences_count' => function ($query) {
            $query->where('statut', 'Approuver');
        }])
            ->orderByDesc('approved_experiences_count')
            ->take(3)
            ->get();


        $users = User::whereHas('role', function ($query) {
            $query->whereIn('name_user', ['Chef', 'Gourmand']);
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.dashboard', compact(
            'user',
            'stats',
            'categories',
            'topChefs',
            'users',
            'topGourmands'
        ));
    }

    public function approveUser(User $user)
    {
        $user->update([
            'is_approved' => true,
            'statut' => 'Actif'
        ]);

        return back()->with('success', 'Utilisateur approuvé avec succès.');
    }

    public function suspendUser(User $user)
    {
        $user->update([
            'statut' => 'Suspendu'
        ]);

        return back()->with('success', 'Utilisateur suspendu avec succès.');
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return back()->with('success', 'Utilisateur supprimé avec succès.');
    }


    public function moderateContent()
    {
        // dd('test');
        $recipes = Recipe::with('chef.user')
            ->where('statut', 'En attente')
            ->get();

        // dd(vars: $recipes);

        $experiences = Experience::with('gourmand.user')
            ->where('statut', 'En attente')
            ->get();

        return view('admin.dashboard', compact('recipes', 'experiences'));
    }

    public function approveRecipe(Recipe $recipe)
    {
        $recipe->update(['statut' => 'Approuver']);
        return back()->with('success', 'Recette approuvée avec succès.');
    }

    public function rejectRecipe(Recipe $recipe)
    {
        $recipe->update(['statut' => 'Rejeté']);
        return back()->with('success', 'Recette rejetée avec succès.');
    }

    public function approveExperience(Experience $experience)
    {
        $experience->update(['statut' => 'Approuver']);
        return back()->with('success', 'Expérience approuvée avec succès.');
    }

    public function rejectExperience(Experience $experience)
    {
        $experience->update(['statut' => 'Rejeté']);
        return back()->with('success', 'Expérience rejetée avec succès.');
    }




    // public function test()
    // {
    //     $recipes = Recipe::with('chef.user')
    //     ->where('statut', 'En attente')
    //     ->orderBy('created_at', 'desc')
    //     ->paginate(6, ['*'], 'recipes_page');


    //     $experiences = Experience::with('gourmand.user')
    //         ->where('statut', 'En attente')
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(6, ['*'], 'experiences_page');

    //         return view('admin.dashboard', compact('recipes', 'experiences'));
    //     }

}
