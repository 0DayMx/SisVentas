<?php

namespace sisventas\Modelos\Inst;

use Illuminate\Database\Eloquent\Model;

use sisventas\Modelos\Cotizador\Cotizacion;

class ProcessCotizacion extends Model
{
    // Inserta o actualiza un nuevo registro 
	public static function save_cotizacion( $input, $method, $id )
	{
		$answer_save_cotizacion = [];

		if( $method == 'store' )
		{
			$cot = new Cotizacion;
		}
		elseif( $method == 'update' )
		{
			$cot = Cotizacion::findOrFail( $id );
		}

        $cot->receptor = $input[ 'receptor' ];
        $cot->no_cotizacion = $input[ 'no_cotizacion' ];
        $cot->id_cliente = $input[ 'id_cliente' ];
        $cot->correo = $input[ 'correo' ];
        $cot->fecha_emision = $input[ 'fecha_emision' ];
        $cot->tiempo_entrega = $input[ 'tiempo_entrega' ];
        $cot->condicion_pago = $input[ 'condicion_pago' ];
        $cot->vigencia = $input[ 'vigencia' ];
        $cot->iva = $input[ 'iva' ];
        $cot->descuento = $input[ 'descuento' ];
        $cot->id_userEmisor = 'Por el momento sin usuario hasta login';
        $cot->nota = $input[ 'nota' ];        
        $cot->save();

		if( $cot->save() )
		{
			$answer_save_cotizacion[ 'folio' ] = $cot->no_cotizacion;
			$answer_save_cotizacion[ 'id' ] = $cot->id; //Enviamos el id de regreso para agregar artículos.
			$answer_save_cotizacion[ 'save' ] = true;
		}
		else
		{
			$answer_save_cotizacion[ 'save' ] = false;
		}

		return $answer_save_cotizacion;

	}
}
