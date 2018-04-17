<?php

namespace sisventas\Modelos\Compras;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';
    protected $primaryKey = 'id';
    protected $fillable = [

    	'razon_social',
    	'tipo_documento',
    	'numero_documento',
    	'direccion',
    	'telefono',
    	'correo'

    ];

    public function getTipoDocumento()
    {
        $tipo = $this->attributes['tipo_documento'];

        if($tipo == 1)
        {
            return 'Clave Única de Registro de Población - CURP';
        }
        elseif($tipo == 2)
        {
            return 'Credencia de elector - IFE';
        }
        elseif($tipo == 3)
        {
            return 'Pasaporte';
        }
        elseif($tipo == 4)
        {
            return 'Registro Federal de Contribuyentes - RFC';
        }
    }
}
