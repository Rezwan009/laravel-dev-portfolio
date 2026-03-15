<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SocialLink;
use App\Http\Requests\SocialLinkRequest;

class SocialLinkController extends Controller
{
    public function index()
    {
        return SocialLink::latest()->get();
    }

    public function store(SocialLinkRequest $request)
    {
        $link = SocialLink::create($request->validated());
        return response()->json($link, 201);
    }

    public function show(string $id)
    {
        return SocialLink::findOrFail($id);
    }

    public function update(SocialLinkRequest $request, string $id)
    {
        $link = SocialLink::findOrFail($id);
        $link->update($request->validated());
        return response()->json($link);
    }

    public function destroy(string $id)
    {
        SocialLink::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
