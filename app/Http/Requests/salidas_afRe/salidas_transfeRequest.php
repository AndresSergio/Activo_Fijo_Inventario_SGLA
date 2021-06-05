<?php

namespace App\Http\Requests\salidas_afRe;

use Illuminate\Foundation\Http\FormRequest;

class salidas_transfeRequest extends FormRequest
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
            'origen_suc' => 'required',
            'destino_suc' => 'required',
            /* 'tipo_salidfk' => 'required', */
        ];
    }
    public function messages() //mensajes personalizados
    {
        return [
            'origen_suc.required' => 'El :attribute es obligatorio.',
            'destino_suc.required' => 'El :attribute es obligatorio.',
            /* 'tipo_salidfk.required' => 'El :attribute es obligatorio.' */
        ];
    }
    public function attributes() //por si quieren cambiar el destino_suc de la columna
    {
        return [
            'origen_suc' => 'Código de Origen',
            'destino_suc' => 'Código de Destino',
            /* 'tipo_salidfk' => 'Tipo de movimiento' */
        ];
    }
}
