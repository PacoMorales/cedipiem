<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class METADATO_PADRINOS_Request extends FormRequest
{
    public function messages()
    {
        return [
            'CODIGO_POSTAL.integer'  => 'El CÓDIGO POSTAL debe ser numérico.',
            'LADA_TEL.integer'       => 'La LADA DEL TELÉFONO FIJO debe ser numérico.',
            'TELEFONO.integer'       => 'El TELÉFONO FIJO debe ser numérico.',
            'LADA_CEL.integer'       => 'La LADA DEL CELULAR debe ser numérico.',
            'CELULAR.integer'        => 'El TELÉFONO CELULAR debe ser numérico.',
            'LADA_LAB.integer'       => 'La LADA DEL TELÉFONO DONDE LABORA debe ser numérico.',
            'TELEFONO_LAB.integer'   => 'El TELÉFONO DONDE LABORA debe ser numérico.'
        ];
    }
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
    public function rules()
    {
        return [
            'CODIGO_POSTAL' => 'integer',
            'LADA_TEL'      => 'integer',
            'TELEFONO'      => 'integer',
            'LADA_CEL'      => 'integer',
            'CELULAR'       => 'integer',
            'LADA_LAB'      => 'integer',
            'TELEFONO_LAB'  => 'integer'
        ];
    }
}
