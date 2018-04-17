<?php

namespace sisventas\Http\Requests\Almacen\Categoria;

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
            'nombre' => 'required | unique:categoria'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo es obligatorio',
            'nombre.unique' => 'Esta categoría ya está registrada, ingrese una diferente'
        ];
    }
}
