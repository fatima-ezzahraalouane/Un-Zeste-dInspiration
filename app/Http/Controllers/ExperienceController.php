<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Experience\ExperienceRepositoryInterface;
use App\Repositories\Theme\ThemeRepositoryInterface;
use App\Models\Theme;
use App\Http\Requests\Experience\StoreExperienceRequest;

class ExperienceController extends Controller
{
    protected $experienceRepo;
    protected $themeRepo;

    public function __construct(ExperienceRepositoryInterface $experienceRepo, ThemeRepositoryInterface $themeRepo)
    {
        $this->experienceRepo = $experienceRepo;
        $this->themeRepo = $themeRepo;
    }

    public function index(Request $request, Theme $theme)
    {
        $experiences = $this->experienceRepo->browse($request, $theme);

        $themes = $this->themeRepo->getAll();

        return view('gourmand.experiences', compact('theme', 'experiences', 'themes'));
    }

    public function store(StoreExperienceRequest $request)
    {
        // dd($request->all());
        $this->experienceRepo->store($request);
    
        return redirect()->back()->with('success', 'Votre expérience a été soumise pour validation et sera approuvée par un administrateur.');
    }
}
