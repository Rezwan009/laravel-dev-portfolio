<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionControlRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'section_name' => 'required|string|max:255|unique:section_controls,section_name,' . $this->route('section_control'),
            'is_active' => 'boolean',
            'order_no' => 'integer',
        ];
    }
}
