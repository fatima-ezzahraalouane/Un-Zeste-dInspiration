<?php

namespace App\Repositories\Theme;

use App\Models\Theme;
use App\Http\Requests\Theme\StoreThemeRequest;
use App\Http\Requests\Theme\UpdateThemeRequest;

class ThemeRepository implements ThemeRepositoryInterface
{
    public function getAll()
    {
        return Theme::all();
    }

    public function browse()
    {
        return Theme::paginate(6);
    }

    public function store(StoreThemeRequest $request)
    {
        return Theme::create([
            'name' => $request->name,
            'image' => $request->image,
            'description' => $request->description,
        ]);
    }

    public function update(UpdateThemeRequest $request, $id)
    {
        $theme = Theme::findOrFail($id);

        $theme->update([
            'name' => $request->name,
            'image' => $request->image,
            'description' => $request->description,
        ]);

        return $theme;
    }

    public function destroy($id)
    {
        $theme = Theme::findOrFail($id);
        return $theme->delete();
    }
}
