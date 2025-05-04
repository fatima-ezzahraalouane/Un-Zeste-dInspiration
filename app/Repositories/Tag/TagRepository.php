<?php

namespace App\Repositories\Tag;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Repositories\Tag\TagRepositoryInterface;

class TagRepository implements TagRepositoryInterface
{
    public function getAll()
    {
        return Tag::all();
    }

    public function store(Request $request)
    {
        return Tag::create($request->validated());
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($request->validated());
        return $tag;
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        return $tag->delete();
    }

    public function findById($id)
    {
        return Tag::findOrFail($id);
    }
}
