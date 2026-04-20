<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'moto' => 'nullable|string',
            'profile_image' => 'nullable|image|max:2048',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:255',
        ];
    }
}
