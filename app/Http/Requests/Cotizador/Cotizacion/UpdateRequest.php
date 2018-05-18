<?php

namespace sisventas\Http\Requests\Cotizador\Cotizacion;

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
            'receptor' => 'required',
            'correo' => 'email',
            'id_cliente' => 'required',
            'no_cotizacion' => 'required | unique:cot_cotizacion,no_cotizacion,'.$this->id.',id',
            'fecha_emision' => 'required',
            'iva' => 'required',
            'descuento' => 'numeric | between: 0,100',
            'tiempo_entrega' => 'required',
            'condicion_pago' => 'required',
            'vigencia' => 'required',
            //'tipo_moneda' => 'required',
            'nota' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo es obligatorio',
            'email' => 'Este campo debe ser de tipo email. Por ejemplo correo@dominio.com',
            'no_cotizacion.unique' => 'Este número de cotización ya está registrado',
            'numeric' => 'Este campo debe ser solo numerico',
            'descuento.between' => 'El descuento solo puede ser desde 0 hasta 100'
        ];
    }
}
