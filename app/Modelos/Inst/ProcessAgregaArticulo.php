<?php

namespace sisventas\Modelos\Inst;

use Illuminate\Database\Eloquent\Model;

class ProcessAgregaArticulo extends Model
{
    /*
    	- Obtenemos el importe sin iva de todos los articulos agregados a la cotización
    	- Obtenemos si aplica o no el iva
    	- Retorna el subtotal
    	- Retorna el iva
    	- Retorna el total
    */
    public static function getTaxes( $articulos_agregados, $__varIva, $__varDescuento )
    {
    	$answer_taxes = [];

    	// Obtenemos el importe sin iva de todos los articulos agregados
        $importeSinIVA = 0;
        
        foreach( $articulos_agregados as $dato )
        {
            $oper = $dato->cantidad * $dato->precio_venta;
            $importeSinIVA += $oper;
        }

        // ------------------//

        // Verificamos si aplica IVA o no
        $__valorIva = ProcessAgregaArticulo::getValorIva( $__varIva );
        
        // -------------------//

        // Calculamos el descuento en decimal
        $__descuentoDecimal = number_format( ( $__varDescuento / 100 ),2,'.','' );

        $__subtotal = number_format( $importeSinIVA,2,'.','' ); // Var retornada
        $__iva = number_format( ( $__subtotal * $__valorIva ),2,'.','' ); // Var retornada

        $__totalSinDescuento = number_format( ( $__subtotal + $__iva ),2,'.','' );

        //Multiplicamos el total sin descuento por el descuento en decimal para sacar el equivalente.
        $__total_x_descuentoDecimal = number_format( ( $__totalSinDescuento * $__descuentoDecimal ),2,'.','' );
        
        //Obtenemos el total Restando el (total sin descuento) menos ( el equivalente al descuento del total )
        $__total = number_format( ( $__totalSinDescuento - $__total_x_descuentoDecimal ),2,'.','' ); // Var retornada

        // ---------------------------//

        $answer_taxes[ 'subtotal' ] = $__subtotal;
        $answer_taxes[ 'iva' ] = $__iva;
        $answer_taxes[ 'total_sin_descuento' ] = $__totalSinDescuento;
        $answer_taxes[ 'a_descontar' ] = $__total_x_descuentoDecimal;
        $answer_taxes[ 'total' ] = $__total;
        
        return $answer_taxes;
    }


    // Verifica si aplica iva
    private static function getValorIva( $__varIva )
    {
        if( $__varIva == 1 )
        { 
            return 0; 
        } 
        elseif( $__varIva == 2 )
        { 
            return 0.16;  
        }
    }

}
