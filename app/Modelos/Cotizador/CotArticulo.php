<?php

namespace sisventas\Modelos\Cotizador;

use Illuminate\Database\Eloquent\Model;

class CotArticulo extends Model
{
    protected $table = 'cot_articulo';
    protected $primaryKey = 'id';
    protected $fillable = [

    		'id_cotizacion',
    		'cantidad',
    		'id_articulo',
    		
    ];


    // Obtenemos el importe, multiplicando la cantidad por el precio de venta del artículo
    public function getImporteSinIVA()
    {
    	$__cantidad = $this->attributes[ 'cantidad' ];
    	$__precioVenta = $this->attributes[ 'precio_venta' ];

    	$__operacion = $__cantidad * $__precioVenta;

		$var = number_format( $__operacion,2,'.',',' );
    	return $var;
    }
}
