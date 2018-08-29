<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FURWEB_CTRL_ACCESO_13_Request extends FormRequest
{
    public function messages()
    {
        return [
            'LOGIN.min'         => 'El USUARIO debe ser de mínimo 5 caracteres.',
            'LOGIN.max'         => 'El USUARIO debe ser de máximo 50 caracteres.',
            'LOGIN.required'    => 'El USUARIO es necesario para entrar al sistema.',
            'PASSWORD.min'      => 'La CONTRASEÑA debe ser de mínimo 6 caracteres.',
            'PASSWORD.max'      => 'La CONTRASEÑA debe ser de máximo 30 caracteres.',
            'PASSWORD.required' => 'La CONTRASEÑA es necesaria para registrarse.',
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
            'LOGIN' =>  'min:5|max:50|required',
            'PASSWORD' =>  'min:6|max:30|required'
        ];
    }
}
