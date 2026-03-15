<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'live_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'featured' => 'boolean',
            'status' => 'required|in:draft,published',
            'technologies' => 'nullable|array',
            'categories' => 'nullable|array',
        ];
    }
}
