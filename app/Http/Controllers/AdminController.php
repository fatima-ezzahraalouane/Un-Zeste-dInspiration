<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'recipes' => Recipe::count(),
            'experiences' => Experience::count(),
            'chefs' => Chef::count(),
            'gourmands' => Gourmand::count(),
        ];

        $categories = Category::withCount('recipes')->get();

        $topChefs = Chef::withCount(['recipes as approved_recipes_count' => function ($query) {
            $query->where('statut', 'approuver');
        }])
            ->orderByDesc('approved_recipes_count')
            ->take(3)
            ->get();

        $topGourmands = Gourmand::withCount(['experiences as approved_experiences_count' => function ($query) {
            $query->where('statut', 'approuver');
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
}
