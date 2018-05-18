<?php

namespace sisventas\Modelos\Almacen;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $table = 'lote';
    protected $primaryKey = 'id';
    protected $fillable = [

    	'nombre',
    	'precio_compra',
    	'precio_venta',
    	'tipo_moneda',
    	'tipo_cambio',
    	'id_articulo',
        'id_proveedor'

    ];


    // Obtenemos el tipo de moneda según el valor de la BD
    public function getTipoMoneda()
    {
        switch ( $this->attributes['tipo_moneda'] ) {
            case '1':
                return 'USD - Dolar americano';
                break;
            case '2':
                return 'CAD - Dolar canadiense';
                break;
            case '3':
                return 'EUR - Euro'; 
                break;
            case '4':
                return 'MXN - Peso mexicano';
                break;            
            default:
                # code...
                break;
        }
    }

    /*
        Obtenemos el precio real ( precio ya convertido a moneda nacional )
        Si hay tipo de cambio, lo multiplicamos por el precio de compra, si no dejamos el precio de compra normal.
    */
    public function getPurchasePrice()
    {
        $__varTCambio = $this->attributes[ 'tipo_cambio' ];
        $__varPurchasePrice = $this->attributes[ 'precio_compra' ];

        if( $__varTCambio != null )
        {
            $result = number_format( ( $__varTCambio * $__varPurchasePrice ),2,'.',',' );
            return $result;
        }
        elseif( $__varTCambio == null )
        {
            return $this->attributes[ 'precio_compra' ];
        }
    }
}
