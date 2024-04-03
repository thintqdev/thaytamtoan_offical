<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:1|max:255',
            'google_drive_url' => 'required|active_url|min:1|max:1000',
            'status' => 'boolean'
        ];
    }

    public function attributes()
    {
        return [
            'name'             => 'Tên tài liệu',
            'google_drive_url' => 'Link tài liệu'
        ];
    }
}
