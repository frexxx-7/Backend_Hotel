<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Password;

class SignupRequest extends FormRequest
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
            'login' => 'required|string|max:55',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                ->letters()
                ->symbols()
            ]
        ];
    }
}