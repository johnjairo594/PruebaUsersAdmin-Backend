<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CargoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'codigo' => 'required|string|max:10|unique:cargos,codigo,' . $this->route('cargo')?->id,
            'nombre' => 'required|string|max:100|',
            'activo' => 'required|boolean',
            'idUsuarioCreacion' => 'required|exists:users,id',
        ];
    }
}