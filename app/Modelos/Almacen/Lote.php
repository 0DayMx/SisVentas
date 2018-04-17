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
        $tipo_moneda = $this->attributes['tipo_moneda'];

        if($tipo_moneda = 1)
        {
            return 'Dolar Americano';
        }
        elseif($tipo_moneda = 2)
        {
            return 'Dolar Canadiense';
        }
        elseif($tipo_moneda = 3)
        {
            return 'Euro';
        }
        elseif($tipo_moneda = 4)
        {
            return 'Peso Mexicano';
        }
    }
}
