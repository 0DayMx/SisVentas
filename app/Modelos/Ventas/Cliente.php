<?php

namespace sisventas\Modelos\Ventas;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'id';
    protected $fillable = [

    	'razon_social',
    	'regimen_fiscal',
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
