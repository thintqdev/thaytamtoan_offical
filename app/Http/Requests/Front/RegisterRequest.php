<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|min:6|max:255|unique:users,email',
            'username' => 'required|max:255|unique:users,username',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'password' => 'required||min:6|max:255|confirmed'
        ];
    }
}
