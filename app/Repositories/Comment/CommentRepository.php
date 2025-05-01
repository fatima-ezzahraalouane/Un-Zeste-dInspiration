<?php

namespace App\Repositories\Comment;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;

class CommentRepository implements CommentRepositoryInterface
{
    public function getAll()
    {
        return Comment::with('commentable', 'gourmand.user')->latest()->get();
    }

    public function store(StoreCommentRequest $request)
    {
        return Comment::create([
            'content' => $request->content,
            'commentable_id' => $request->commentable_id,
            'commentable_type' => $request->commentable_type,
            'gourmand_id' => Auth::user()->gourmand->id,
        ]);
    }

    public function update(UpdateCommentRequest $request, $id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->gourmand_id !== Auth::user()->gourmand->id) {
            abort(403);
        }
        $comment->update(['content' => $request->content]);
        return $comment;
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->gourmand_id !== Auth::user()->gourmand->id) {
            abort(403);
        }
        $comment->delete();
        return true;
    }
}
