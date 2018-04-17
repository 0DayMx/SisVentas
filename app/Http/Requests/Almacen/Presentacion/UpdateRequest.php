<?php

namespace sisventas\Http\Requests\Almacen\Presentacion;

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
            'nombre' => 'required | unique:presentacion,nombre,'.$this->id.',id'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo es obligatorio',
            'nombre.unique' => 'Esta presentación ya está registrada, ingrese una diferente'
        ];
    }
}
