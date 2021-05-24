<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class departamento_afRequest extends FormRequest
{
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
     * @return array
     */
    public function rules() //reglas de validacion
    {
        return [
            'codigo' => 'required',
            'nombre' => 'required',
            'estado' => 'required',
        ];
    }
    public function messages() //mensajes personalizados
    {
        return [
            'codigo.required' => 'El :attribute es obligatorio.',
            'nombre.required' => 'El :attribute es obligatorio.',
            'estado.required' => 'El :attribute es obligatorio.'
        ];
    }
    public function attributes() //por si quieren cambiar el nombre de la columna
    {
        return [
            'codigo' => 'Código',
            'nombre' => 'Nombre',
            'estado' => 'Estado',
        ];
    }
}
