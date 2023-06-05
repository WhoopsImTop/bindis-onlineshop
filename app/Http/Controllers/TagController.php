<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use Illuminate\Http\Request;
use App\Models\Model\Tag;

class TagController extends Controller
{
    public function index()
    {
        return TagResource::collection(Tag::paginate(100));
    }

    public function store(Request $request)
    {
        $tag = Tag::create($request->all());

        return TagResource::make($tag);
    }

    public function show(Tag $tag)
    {
        return TagResource::make($tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());

        return TagResource::make($tag);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json(null, 204);
    }
}
