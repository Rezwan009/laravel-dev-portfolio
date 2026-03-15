<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\About;
use App\Http\Requests\AboutRequest;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        return About::first() ?? About::create();
    }

    public function update(AboutRequest $request)
    {
        $about = About::first();
        if (!$about) {
            $about = About::create();
        }

        $validated = $request->validated();

        if ($request->hasFile('profile_image')) {
            if ($about->profile_image) Storage::disk('public')->delete($about->profile_image);
            $validated['profile_image'] = $request->file('profile_image')->store('about', 'public');
        }

        if ($request->hasFile('resume')) {
            if ($about->resume) Storage::disk('public')->delete($about->resume);
            $validated['resume'] = $request->file('resume')->store('about', 'public');
        }

        $about->update($validated);
        return response()->json($about);
    }
}
