<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoMetaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'page' => 'required|string|max:255|unique:seo_metas,page,' . $this->route('seo_meta'),
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ];
    }
}
