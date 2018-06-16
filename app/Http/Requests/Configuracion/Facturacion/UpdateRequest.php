<?php

namespace sisventas\Http\Requests\Configuracion\Facturacion;

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
            'razon_social' => 'required',
            'rfc' => 'required | between:12,13',
            'codigo_postal' => 'required',
            'calle' => 'required',
            'colonia' => 'required',
            'municipio' => 'required',
            'entidad' => 'required',
            'correo' => 'email'
        ];
    }

    public function messages()
    {
        return [
            'required' => '*Este campo es obligatorio',
            'rfc.between' => 'El rfc debe tener entre 12 y 13 caracteres',
            'email' => 'Este campo debe ser de tipo email. Por ejemplo correo@dominio.com'
        ];
    }
}
