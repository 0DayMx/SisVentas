<?php

namespace sisventas\Modelos\Configuracion;

use Illuminate\Database\Eloquent\Model;

class DatosFacturacion extends Model
{
    protected $table = 'datos_facturacion';
    protected $primaryKey = 'id';
    protected $fillable = [

    		'razon_social',
    		'rfc',
            'regimen_fiscal',
    		'codigo_postal',
    		'calle',
    		'colonia',
    		'municipio',
    		'entidad'    		
    ];

    // Obtenemos la dirección fiscal completa
    public function getDireccion()
    {
        $calle = $this->attributes[ 'calle' ];
        $colonia = $this->attributes[ 'colonia' ];
        $codigo_postal = $this->attributes[ 'codigo_postal' ];
        $municipio = $this->attributes[ 'municipio' ];
        $entidad = $this->attributes[ 'entidad' ];

        return $calle.', '.$colonia.', '.$codigo_postal.', '.$municipio.', '.$entidad;
    }

}
