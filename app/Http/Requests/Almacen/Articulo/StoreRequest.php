<?php

namespace sisventas\Http\Requests\Almacen\Articulo;

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
            'nombre' => 'required | unique:articulo',
            'id_categoria' => 'required',
            'id_presentacion' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo es obligatorio',
            'nombre.unique' => 'Este artículo ya está registrado, ingrese uno diferente'
        ];
    }
}
