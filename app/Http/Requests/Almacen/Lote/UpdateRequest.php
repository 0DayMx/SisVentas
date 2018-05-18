<?php

namespace sisventas\Http\Requests\Almacen\Lote;

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
            'nombre' => 'required | unique:lote,nombre,'.$this->id.',id',
            'id_articulo' => 'required',
            'precio_compra' => 'required | numeric | between: 0,1000000.000',
            'tipo_moneda' => 'required',
            'tipo_cambio' => 'numeric | between: 0,1000000.000',
            'precio_venta' => 'required | numeric | between: 0,1000000.000'

        ];
    }

    public function messages()
    {
        
        return  [
            'required' => 'Este campo es obligatorio',
            'nombre.lote' => 'Este nombre de lote ya está registrado, ingrese uno diferente',
            'numeric' => 'Solo números enteros o decimales',
            'precio_compra.between' => 'El valor debe de ser entre 0 y 1000000.000',
            'precio_venta.between' => 'El valor debe de ser entre 0 y 1000000.000',
            'tipo_cambio.between' => 'El valor debe de ser entre 0 y 1000000.000'

        ];
        
    }
}
