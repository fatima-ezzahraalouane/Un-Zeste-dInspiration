<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Tag\StoreTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use App\Repositories\Tag\TagRepositoryInterface;

class TagController extends Controller
{
    protected $tagRepo;

    public function __construct(TagRepositoryInterface $tagRepo)
    {
        $this->tagRepo = $tagRepo;
    }

    public function index()
    {
        $tags = $this->tagRepo->getAll();
        return view('tags.index', compact('tags'));
    }

    public function store(StoreTagRequest $request)
    {
        $this->tagRepo->store($request);
        return redirect()->back()->with('success', 'Tag ajouté avec succès.');
    }

    public function update(UpdateTagRequest $request, $id)
    {
        $this->tagRepo->update($request, $id);
        return redirect()->back()->with('success', 'Tag mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $this->tagRepo->destroy($id);
        return redirect()->back()->with('success', 'Tag supprimé avec succès.');
    }
}