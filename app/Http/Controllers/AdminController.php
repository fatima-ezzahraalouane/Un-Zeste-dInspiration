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

        return view('admin.dashboard', compact(
            'user',
            'stats', 'categories'
        ));
    }
}
