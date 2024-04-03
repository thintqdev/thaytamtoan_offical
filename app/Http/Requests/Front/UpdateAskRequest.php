<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:1|max:255',
            'body'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Yêu cầu điền tiêu đề câu hỏi',
            'body.required'  => 'Yêu cầu điền nội dung câu hỏi!'
        ];
    }
}
