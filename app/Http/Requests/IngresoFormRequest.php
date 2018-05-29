<?php

namespace sisventas\Http\Requests;

use sisventas\Http\Requests\Request;

class IngresoFormRequest extends Request
{
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
            //
            'id_lote'=>'required',
            'cantidad'=>'required',
            'tipo_comprobante'=>'required|max:20',
            'numero_comprobante'=>'required|max:20'
        ];
    }
}
