<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BlogPostRequest;

use App\Models\BlogPost;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    public function index()
    {
        return BlogPost::with('tags')->latest()->get();
    }

    public function store(BlogPostRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['title']);
        if (BlogPost::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] .= '-' . time();
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blog', 'public');
        }

        $post = BlogPost::create($validated);

        if (isset($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        }

        return response()->json($post->load('tags'), 201);
    }

    public function show(string $id)
    {
        return BlogPost::with('tags')->findOrFail($id);
    }

    public function update(BlogPostRequest $request, string $id)
    {
        $post = BlogPost::findOrFail($id);

        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['title']);
        if (BlogPost::where('slug', $validated['slug'])->where('id', '!=', $id)->exists()) {
            $validated['slug'] .= '-' . time();
        }

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $validated['image'] = $request->file('image')->store('blog', 'public');
        }

        $post->update($validated);

        if (isset($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        }

        return response()->json($post->load('tags'));
    }

    public function destroy(string $id)
    {
        $post = BlogPost::findOrFail($id);
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        
        return response()->json(null, 204);
    }
}
