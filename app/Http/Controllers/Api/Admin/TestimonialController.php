<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TestimonialRequest;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        return Testimonial::latest()->get();
    }

    public function store(TestimonialRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial = Testimonial::create($validated);
        return response()->json($testimonial, 201);
    }

    public function show(string $id)
    {
        return Testimonial::findOrFail($id);
    }

    public function update(TestimonialRequest $request, string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update($validated);
        return response()->json($testimonial);
    }

    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
        $testimonial->delete();
        
        return response()->json(null, 204);
    }
}
