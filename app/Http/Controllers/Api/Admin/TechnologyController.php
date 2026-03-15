<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TechnologyRequest;

use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {
        return Technology::latest()->get();
    }

    public function store(TechnologyRequest $request)
    {
        $validated = $request->validated();

        $technology = Technology::create($validated);
        return response()->json($technology, 201);
    }

    public function show(string $id)
    {
        return Technology::findOrFail($id);
    }

    public function update(TechnologyRequest $request, string $id)
    {
        $technology = Technology::findOrFail($id);
        
        $validated = $request->validated();

        $technology->update($validated);
        return response()->json($technology);
    }

    public function destroy(string $id)
    {
        Technology::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
