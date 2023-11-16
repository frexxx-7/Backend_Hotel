<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReservationRequest extends FormRequest
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
            'idUser' => ['required', 'integer'],
            'idRoom' => ['required', 'integer'],
            'idStatus'=> ['nullable', 'integer'],
            'arrivalDate' => ['required','date'],
            'departureDate' => ['required','date'],
        ];
    }
}