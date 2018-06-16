<?php

namespace sisventas\Http\Requests\Configuracion\Logo;

use sisventas\Http\Requests\Request;

class StoreRequest extends Request
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'file' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => '*Este campo es requerido'
        ];
    }
}
