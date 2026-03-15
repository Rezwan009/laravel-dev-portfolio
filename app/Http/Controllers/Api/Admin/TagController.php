<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;

use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        return Tag::latest()->get();
    }

    public function store(TagRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']);

        if (Tag::where('slug', $validated['slug'])->exists()) {
            return response()->json(['message' => 'Tag with this name/slug already exists.'], 422);
        }

        $tag = Tag::create($validated);
        return response()->json($tag, 201);
    }

    public function show(string $id)
    {
        return Tag::findOrFail($id);
    }

    public function update(TagRequest $request, string $id)
    {
        $tag = Tag::findOrFail($id);
        
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']);

        if (Tag::where('slug', $validated['slug'])->where('id', '!=', $id)->exists()) {
            return response()->json(['message' => 'Tag with this name/slug already exists.'], 422);
        }

        $tag->update($validated);
        return response()->json($tag);
    }

    public function destroy(string $id)
    {
        Tag::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
