<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'author' => 'sometimes|required|string|min:50',
            'year' => 'sometimes|required|integer|min:1000|max:'.date('Y'),
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio',
            'author.required' => 'El autor es obligatorio',
            'author.min' => 'El nombre del autor debe tener al menos 50 caracteres',
            'year.required' => 'El año es obligatorio',
        ];
    }
}
