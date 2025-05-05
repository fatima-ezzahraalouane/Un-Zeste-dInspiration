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
use App\Models\Tag;
use App\Models\Theme;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $stats = [
            'recipes' => Recipe::where('statut', 'Approuvé')->count(),
            'experiences' => Experience::where('statut', 'Approuvé')->count(),
            'chefs' => Chef::count(),
            'gourmands' => Gourmand::count(),
        ];

        $categories = Category::withCount('recipes')->get();
        $tags = Tag::withCount('recipes')->get();
        $themes = Theme::withCount('experiences')->get();

        $recipes = Recipe::with(['chef.user', 'category'])
            ->latest()
            ->paginate(15);

        $experiences = Experience::with(['gourmand.user', 'theme'])
            ->latest()
            ->paginate(15);

        $topChefs = Chef::withCount(['recipes as approved_recipes_count' => function ($query) {
            $query->where('statut', 'Approuvé');
        }])
            ->orderByDesc('approved_recipes_count')
            ->take(3)
            ->get();

        $topGourmands = Gourmand::withCount(['experiences as approved_experiences_count' => function ($query) {
            $query->where('statut', 'Approuvé');
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
            'tags',
            'themes',
            'recipes',
            'experiences',
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
            'is_approved' => false,
            'statut' => 'Suspendu'
        ]);

        return back()->with('success', 'Utilisateur suspendu avec succès.');
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return back()->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function approveRecipe(Recipe $recipe)
    {
        try {
            DB::beginTransaction();
            
            $recipe->update([
                'statut' => 'Approuvé'
            ]);
            
            DB::commit();
            return redirect()->back()->with('success', 'Recette approuvée avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'approbation de la recette.');
        }
    }

    public function rejectRecipe(Recipe $recipe)
    {
        try {
            DB::beginTransaction();
            
            $recipe->update([
                'statut' => 'Rejeté'
            ]);
            
            DB::commit();
            return redirect()->back()->with('success', 'Recette rejetée avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Une erreur est survenue lors du rejet de la recette.');
        }
    }

    public function approveExperience(Experience $experience)
    {
        try {
            DB::beginTransaction();
            
            $experience->update([
                'statut' => 'Approuvé'
            ]);
            
            DB::commit();
            return redirect()->back()->with('success', 'Expérience approuvée avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'approbation de l\'expérience.');
        }
    }

    public function rejectExperience(Experience $experience)
    {
        try {
            DB::beginTransaction();
            
            $experience->update([
                'statut' => 'Rejeté'
            ]);
            
            DB::commit();
            return redirect()->back()->with('success', 'Expérience rejetée avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Une erreur est survenue lors du rejet de l\'expérience.');
        }
    }
}
