<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'usuario' => 'required|string|max:100|unique:users,usuario,' . $this->route('user')?->usuario,
            'primerNombre' => 'required|string|max:100',
            'segundoNombre' => 'nullable|string|max:100',
            'primerApellido' => 'required|string|max:100',
            'segundoApellido' => 'nullable|string|max:100',
            'idDepartamento' => 'required|exists:departamentos,id',
            'idCargo' => 'required|exists:cargos,id'
        ];
    }
}