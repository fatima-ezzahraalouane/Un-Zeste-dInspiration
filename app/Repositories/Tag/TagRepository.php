<?php

namespace App\Repositories\Tag;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Repositories\Tag\TagRepositoryInterface;

class TagRepository implements TagRepositoryInterface
{
    public function all()
    {
        return Tag::all();
    }

    public function store(Request $request)
    {
        return Tag::create([
            'name' => $request->name,
        ]);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update([
            'name' => $request->name,
        ]);
        return $tag;
    }

    public function destroy($id)
    {
        return Tag::destroy($id);
    }

    public function findById($id)
    {
        return Tag::findOrFail($id);
    }
}
