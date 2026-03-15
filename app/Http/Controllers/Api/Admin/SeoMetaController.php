<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SeoMeta;
use App\Http\Requests\SeoMetaRequest;

class SeoMetaController extends Controller
{
    public function index()
    {
        return SeoMeta::get();
    }

    public function store(SeoMetaRequest $request)
    {
        $meta = SeoMeta::create($request->validated());
        return response()->json($meta, 201);
    }

    public function show(string $id)
    {
        return SeoMeta::findOrFail($id);
    }

    public function update(SeoMetaRequest $request, string $id)
    {
        $meta = SeoMeta::findOrFail($id);
        $meta->update($request->validated());
        return response()->json($meta);
    }

    public function destroy(string $id)
    {
        SeoMeta::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
