<?php

namespace App\Repositories\Experience;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Requests\Experience\StoreExperienceRequest;
use App\Http\Requests\Experience\UpdateExperienceRequest;
use App\Models\Theme;

class ExperienceRepository implements ExperienceRepositoryInterface
{
    public function browse(Request $request, Theme $theme)
    {
        $query = Experience::where('theme_id', $theme->id)
            ->where('statut', 'Approuver');

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        $perPage = $request->input('per_page', 5);

        return $query->paginate($perPage);
    }

    public function store(StoreExperienceRequest $request)
    {
        $data = $request->validated();
    
        $data['gourmand_id'] = auth()->user()->gourmand->id;
        $data['statut'] = 'En attente';
    
        return Experience::create($data);
    }

    public function show($id)
    {
        return Experience::with('theme')->findOrFail($id);
    }

    public function update(UpdateExperienceRequest $request, $id)
    {
        $experience = Experience::findOrFail($id);
        $experience->update($request->validated());

        return $experience;
    }

    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        return $experience->delete();
    }
}
