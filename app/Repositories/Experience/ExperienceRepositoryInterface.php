<?php

namespace App\Repositories\Experience;

use Illuminate\Http\Request;
use App\Http\Requests\Experience\StoreExperienceRequest;
use App\Http\Requests\Experience\UpdateExperienceRequest;
use App\Models\Theme;

interface ExperienceRepositoryInterface
{
    public function browse(Request $request, Theme $theme);
    public function store(StoreExperienceRequest $request);
    public function show($id);
    public function update(UpdateExperienceRequest $request, $id);
    public function destroy($id);
    public function getMostCommentedExperiences(int $limit = 3);
}
