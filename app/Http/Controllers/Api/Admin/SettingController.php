<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        return Setting::first() ?? Setting::create();
    }

    public function update(SettingRequest $request)
    {
        $setting = Setting::first();
        if (!$setting) {
            $setting = Setting::create();
        }

        $validated = $request->validated();

        if ($request->hasFile('logo')) {
            if ($setting->logo) Storage::disk('public')->delete($setting->logo);
            $validated['logo'] = $request->file('logo')->store('settings', 'public');
        }

        if ($request->hasFile('favicon')) {
            if ($setting->favicon) Storage::disk('public')->delete($setting->favicon);
            $validated['favicon'] = $request->file('favicon')->store('settings', 'public');
        }

        $setting->update($validated);
        return response()->json($setting);
    }
}
