<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class turno_afRequest extends FormRequest
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
            'descripcion' => 'required',
            'horario_ini' => 'required',
            'horario_fin' => 'required',
            'estado' => 'required',
        ];
    }
    public function messages() //mensajes personalizados
    {
        return [
            'descripcion.required' => 'La :attribute es obligatoria.',
            'horario_ini.required' => 'El :attribute es obligatorio.',
            'horario_fin.required' => 'El :attribute es obligatorio.',
            'estado.required' => 'El :attribute es obligatorio.'
        ];
    }
    public function attributes() //por si quieren cambiar el nombre de la columna
    {
        return [
            'descripcion' => 'Descripcion',
            'horario_ini' => 'horario de Inicio',
            'horario_fin' => 'horario de Fin',
            'estado' => 'Estado',
        ];
    }
}
