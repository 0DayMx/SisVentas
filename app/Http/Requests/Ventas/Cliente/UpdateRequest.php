<?php

namespace sisventas\Http\Requests\Ventas\Cliente;

use sisventas\Http\Requests\Request;

class UpdateRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            
            'razon_social' => 'required | unique:cliente,razon_social,'.$this->id.',id',
            'regimen_fiscal' => 'required',
            'tipo_documento' => 'required',
            'numero_documento' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required | email'

        ];
    }

    public function messages()
    {
        return [

            'required' => 'Este campo es obligatorio',
            'razon_social.unique' => 'Esta razón social ya está registrada',
            'email' => 'El correo debe ser una dirección de correo electrónico válida'

        ];
    }
}
