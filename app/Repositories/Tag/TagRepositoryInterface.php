<?php

namespace App\Repositories\Tag;

use Illuminate\Http\Request;

interface TagRepositoryInterface
{
    public function all();
    public function store(Request $request);
    public function update(Request $request, $id);
    public function destroy($id);
    public function findById($id);
}
