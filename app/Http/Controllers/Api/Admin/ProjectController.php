<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::with(['technologies', 'categories', 'images'])->latest()->get();
    }

    public function store(ProjectRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['title']);
        if (Project::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] .= '-' . time();
        }

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('projects', 'public');
        }

        $project = Project::create($validated);

        if (isset($validated['technologies'])) {
            $project->technologies()->sync($validated['technologies']);
        }
        if (isset($validated['categories'])) {
            $project->categories()->sync($validated['categories']);
        }

        return response()->json($project->load(['technologies', 'categories']), 201);
    }

    public function show(string $id)
    {
        return Project::with(['technologies', 'categories', 'images'])->findOrFail($id);
    }

    public function update(ProjectRequest $request, string $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['title']);
        if (Project::where('slug', $validated['slug'])->where('id', '!=', $id)->exists()) {
            $validated['slug'] .= '-' . time();
        }

        if ($request->hasFile('thumbnail')) {
            if ($project->thumbnail) {
                Storage::disk('public')->delete($project->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('projects', 'public');
        }

        $project->update($validated);

        if (isset($validated['technologies'])) {
            $project->technologies()->sync($validated['technologies']);
        }
        if (isset($validated['categories'])) {
            $project->categories()->sync($validated['categories']);
        }

        return response()->json($project->load(['technologies', 'categories']));
    }

    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        if ($project->thumbnail) {
            Storage::disk('public')->delete($project->thumbnail);
        }
        $project->delete();
        
        return response()->json(null, 204);
    }
}
