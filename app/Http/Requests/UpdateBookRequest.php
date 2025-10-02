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
            'title' => 'sometimes|required',
            'author' => 'sometimes|required',
            'year' => 'sometimes|required|integer',
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
