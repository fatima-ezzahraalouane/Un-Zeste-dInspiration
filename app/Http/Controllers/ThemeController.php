<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Theme\ThemeRepositoryInterface;
use App\Http\Requests\Theme\StoreThemeRequest;
use App\Http\Requests\Theme\UpdateThemeRequest;

class ThemeController extends Controller
{
    protected $themeRepo;

    public function __construct(ThemeRepositoryInterface $themeRepo)
    {
        $this->themeRepo = $themeRepo;
    }

    public function index()
    {
        $themes = $this->themeRepo->browse();
        return view('gourmand.blog', compact('themes'));
    }

    public function store(StoreThemeRequest $request)
    {
        $this->themeRepo->store($request);
        return redirect()->back()->with('success', 'Thème ajouté avec succès.');
    }

    public function update(UpdateThemeRequest $request, $id)
    {
        $this->themeRepo->update($request, $id);
        return redirect()->back()->with('success', 'Thème mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $this->themeRepo->destroy($id);
        return redirect()->back()->with('success', 'Thème supprimé avec succès.');
    }
}