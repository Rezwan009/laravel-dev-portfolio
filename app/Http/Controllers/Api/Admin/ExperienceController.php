<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Experience;
use App\Http\Requests\ExperienceRequest;

class ExperienceController extends Controller
{
    public function index()
    {
        return Experience::orderBy('start_date', 'desc')->get();
    }

    public function store(ExperienceRequest $request)
    {
        $experience = Experience::create($request->validated());
        return response()->json($experience, 201);
    }

    public function show(string $id)
    {
        return Experience::findOrFail($id);
    }

    public function update(ExperienceRequest $request, string $id)
    {
        $experience = Experience::findOrFail($id);
        $experience->update($request->validated());
        return response()->json($experience);
    }

    public function destroy(string $id)
    {
        Experience::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
