<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProjectImage;
use App\Http\Requests\ProjectImageRequest;
use Illuminate\Support\Facades\Storage;

class ProjectImageController extends Controller
{
    public function index()
    {
        return ProjectImage::latest()->get();
    }

    public function store(ProjectImageRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('project-images', 'public');
        }

        $image = ProjectImage::create($validated);
        return response()->json($image, 201);
    }

    public function show(string $id)
    {
        return ProjectImage::findOrFail($id);
    }

    public function destroy(string $id)
    {
        $image = ProjectImage::findOrFail($id);
        if ($image->image) {
            Storage::disk('public')->delete($image->image);
        }
        $image->delete();
        return response()->json(null, 204);
    }
}
