<?php 

namespace App\Repositories\Comment;

use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;

interface CommentRepositoryInterface
{
    public function getAll();
    public function store(StoreCommentRequest $request);
    public function update(UpdateCommentRequest $request, $id);
    public function destroy($id);
}