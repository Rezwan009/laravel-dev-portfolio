<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::orderBy('sort_order')->latest()->get();
    }

    public function store(ServiceRequest $request)
    {
        $validated = $request->validated();
        
        $validated['slug'] = Str::slug($validated['title']);
        if (Service::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] .= '-' . time();
        }

        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('services', 'public');
        }

        $service = Service::create($validated);
        return response()->json($service, 201);
    }

    public function show(string $id)
    {
        return Service::findOrFail($id);
    }

    public function update(ServiceRequest $request, string $id)
    {
        $service = Service::findOrFail($id);
        
        $validated = $request->validated();
        
        $validated['slug'] = Str::slug($validated['title']);
        if (Service::where('slug', $validated['slug'])->where('id', '!=', $id)->exists()) {
            $validated['slug'] .= '-' . time();
        }

        if ($request->hasFile('icon')) {
            if ($service->icon) {
                Storage::disk('public')->delete($service->icon);
            }
            $validated['icon'] = $request->file('icon')->store('services', 'public');
        }

        $service->update($validated);
        return response()->json($service);
    }

    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        if ($service->icon) {
            Storage::disk('public')->delete($service->icon);
        }
        $service->delete();
        
        return response()->json(null, 204);
    }
}
