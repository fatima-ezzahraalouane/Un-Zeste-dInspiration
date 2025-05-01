<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Repositories\Comment\CommentRepositoryInterface;

class CommentController extends Controller
{
    protected $commentRepo;

    public function __construct(CommentRepositoryInterface $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function index()
    {
        return $this->commentRepo->getAll();
    }

    public function store(StoreCommentRequest $request)
    {
        $this->commentRepo->store($request);
        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');    }

    public function update(UpdateCommentRequest $request, $id)
    {
        $this->commentRepo->update($request, $id);
        return redirect()->back()->with('success', 'Commentaire modifié avec succès.');    }

    public function destroy($id)
    {
        $this->commentRepo->destroy($id);
        return redirect()->back()->with('success', 'Commentaire supprimé avec succès.');    }
}
