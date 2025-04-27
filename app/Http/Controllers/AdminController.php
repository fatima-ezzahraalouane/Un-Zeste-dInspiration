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
            'experiences' => 0,
            'chefs' => Chef::count(),
            'gourmands' => Gourmand::count(),
        ];

        $categories = Category::withCount('recipes')->get();

        $topChefs = Chef::withCount('recipes')
            ->orderByDesc('recipes_count')
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
            'users'
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
}
