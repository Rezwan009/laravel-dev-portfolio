<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Education;
use App\Http\Requests\EducationRequest;

class EducationController extends Controller
{
    public function index()
    {
        return Education::orderBy('start_year', 'desc')->get();
    }

    public function store(EducationRequest $request)
    {
        $education = Education::create($request->validated());
        return response()->json($education, 201);
    }

    public function show(string $id)
    {
        return Education::findOrFail($id);
    }

    public function update(EducationRequest $request, string $id)
    {
        $education = Education::findOrFail($id);
        $education->update($request->validated());
        return response()->json($education);
    }

    public function destroy(string $id)
    {
        Education::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
