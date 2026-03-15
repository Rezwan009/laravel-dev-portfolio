<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SectionControl;
use App\Http\Requests\SectionControlRequest;

class SectionControlController extends Controller
{
    public function index()
    {
        return SectionControl::orderBy('order_no')->get();
    }

    public function store(SectionControlRequest $request)
    {
        $control = SectionControl::create($request->validated());
        return response()->json($control, 201);
    }

    public function show(string $id)
    {
        return SectionControl::findOrFail($id);
    }

    public function update(SectionControlRequest $request, string $id)
    {
        $control = SectionControl::findOrFail($id);
        $control->update($request->validated());
        return response()->json($control);
    }

    public function destroy(string $id)
    {
        SectionControl::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
