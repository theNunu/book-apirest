<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // en caso de que quieras manejar permisos, aquí lo controlas
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'author' => 'required|string',
            'year' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio',
            'author.required' => 'El autor es obligatorio',
            // 'author.min' => 'El nombre del autor debe tener al menos 50 caracteres',
            'year.required' => 'El año es obligatorio',
            'year.integer' => 'El año debe ser un número',
        ];
    }
}
