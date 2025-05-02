<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChefController extends Controller
{
    public function profile()
    {
        $chef = Auth::user()->chef;

        if (!$chef) {
            abort(403, 'Accès non autorisé.');
        }

        $categories = Category::all();
        $tags = Tag::all();
        $recipes = $chef->recipes()
            ->with('category', 'tags')
            ->latest()
            ->paginate(5);

        $stats = [
            'recipes' => $chef->recipes()->where('statut', 'Approuver')->count(),
            'comments' => $chef->recipes()
                ->where('statut', 'Approuver')
                ->withCount('comments')
                ->get()
                ->sum('comments_count'),
            'popularRecipes' => $chef->recipes()
                ->where('statut', 'Approuver')
                ->withCount('comments')
                ->orderByDesc('comments_count')
                ->take(5)
                ->get(),
        ];

        return view('chef.dashboard', compact('chef', 'stats'));
    }
}
