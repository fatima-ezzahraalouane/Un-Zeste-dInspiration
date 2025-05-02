<?php

namespace App\Http\Controllers;

use App\Http\Requests\Experience\UpdateExperienceRequest;
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

    public function show($id)
    {
        $experience = $this->experienceRepo->show($id);
        return view('gourmand.experience-detail', compact('experience'));
    }

    public function update(UpdateExperienceRequest $request, $id)
    {
        $this->experienceRepo->update($request, $id);
        return redirect()->back()->with('success', 'Votre expérience a été mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $this->experienceRepo->destroy($id);
        return redirect()->back()->with('success', 'Votre expérience a été supprimée avec succès.');
    }
}
