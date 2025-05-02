<?php

namespace App\Http\Controllers;

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
        
        return view('chef.dashboard', compact('chef'));
    }
}
