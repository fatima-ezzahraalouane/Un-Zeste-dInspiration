<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Chef;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Chef\UpdateProfileRequest;

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
            'recipes' => $chef->recipes()->where('statut', 'Approuvé')->count(),
            'comments' => $chef->recipes()
                ->where('statut', 'Approuvé')
                ->withCount('comments')
                ->get()
                ->sum('comments_count'),
            'favorites' => $chef->recipes()
                ->where('statut', 'Approuvé')
                ->withCount('favoritedBy')
                ->get()
                ->sum('favorited_by_count'),

            'popularRecipes' => $chef->recipes()
                ->where('statut', 'Approuvé')
                ->withCount('comments')
                ->orderByDesc('comments_count')
                ->take(5)
                ->get(),
        ];

        return view('chef.dashboard', compact('chef', 'stats', 'categories', 'tags', 'recipes'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $chef = $user->chef;

        $user->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'avatar'     => $request->avatar,
        ]);

        $chef->update([
            'adresse'    => $request->adresse,
            'biographie' => $request->biographie,
            'specialite' => $request->specialite,
        ]);

        return redirect()->route('chef.dashboard')->with('success', 'Profil mis à jour avec succès.');
    }
}
