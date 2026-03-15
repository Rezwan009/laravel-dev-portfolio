<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::latest()->get();
    }

    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']);

        if (Category::where('slug', $validated['slug'])->exists()) {
            return response()->json(['message' => 'Category with this name/slug already exists.'], 422);
        }

        $category = Category::create($validated);
        return response()->json($category, 201);
    }

    public function show(string $id)
    {
        return Category::findOrFail($id);
    }

    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']);

        if (Category::where('slug', $validated['slug'])->where('id', '!=', $id)->exists()) {
            return response()->json(['message' => 'Category with this name/slug already exists.'], 422);
        }

        $category->update($validated);
        return response()->json($category);
    }

    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
