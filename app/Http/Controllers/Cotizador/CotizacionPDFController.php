<?php

namespace sisventas\Http\Controllers\Cotizador;

use Illuminate\Http\Request;

use sisventas\Http\Requests;
use sisventas\Http\Controllers\Controller;

//Modelos 
use sisventas\Modelos\Cotizador\Cotizacion;
use sisventas\Modelos\Configuracion\Logo;
use sisventas\Modelos\Configuracion\DatosFacturacion;
use sisventas\Modelos\Cotizador\CotArticulo;
use sisventas\Modelos\Ventas\Cliente;

// Instancias
use sisventas\Modelos\Inst\ProcessAgregaArticulo;

class CotizacionPDFController extends Controller
{
    public function export( $id, $tipo )
    {
    	//Models
    	$model_a = new Cotizacion;
    	$model_b = new Logo;
    	$model_c = new DatosFacturacion;
    	$model_d = new CotArticulo;
    	$model_e = new Cliente;

    	$cotizacion = $model_a->findOrFail( $id );
    	$folio = $cotizacion->no_cotizacion;

    	//Verificamos si hay logotipo registrado
		$verifi_logo = $this->getLogo( $model_b );

		// Verificamos si hay datos de facturacion registrados
		$verifi_datosFacturacion = $this->getDatosFacturacion( $model_c );

		/*
			Verificamos si en la cotización se seleccionó un cliente del catálogo de clientes, 
			o si solo fue con atención a una persona
		*/
		$verifi_id_cliente = $this->getCliente( $model_e, $cotizacion->id_cliente );


		//Obtenemos si se aplicó iva y hubo descuento
		$__varIva = $cotizacion->iva;
        $__varDescuento = $cotizacion->descuento;


        //Agregamos la lista de los artículos agregados a la cotización contenidos en los lotes.
        $articulos_agregados = CotArticulo::select(
                'cot_articulo.cantidad',
                'articulo.nombre as articulo',
                'articulo.descripcion as descripcion_articulo',
                'lote.precio_venta')
        ->join( 'lote','lote.id','=','cot_articulo.id_lote' )
        ->join( 'articulo','articulo.id','=','lote.id_articulo' )
        ->where( 'id_cotizacion',$id )
        ->get();

        //Obtenemos Subtotal, IVA y Total
        $answer_taxes = ProcessAgregaArticulo::getTaxes(
                $articulos_agregados,
                $__varIva,
                $__varDescuento
            );

        $subtotal = number_format( $answer_taxes[ 'subtotal' ],2,'.',',' );
        $iva = number_format( $answer_taxes[ 'iva' ],2,'.',',' );
        //$total_sin_descuento = number_format( $answer_taxes[ 'total_sin_descuento' ],2,'.',',' );
        $a_descontar = number_format( $answer_taxes[ 'a_descontar' ],2,'.',',' );
        $total = number_format( $answer_taxes[ 'total' ],2,'.',',' );

        // Enviamos el array de los articulos agregados
        $array_agregados = [

            'articulos_agregados' => $articulos_agregados,
            'subtotal' => $subtotal,
            'iva' => $iva,
            //'total_sin_descuento' => $total_sin_descuento,
            'a_descontar' =>  $a_descontar,
            'total' => $total

        ];


    	// Enviamos todo el array de datos
    	$array = [

    		'cotizacion' => $cotizacion

    	];

    	$vista = 'Cotizador.PDF.cotizacion';

    	return $this->process_pdf( 
    		$folio,
    		$verifi_logo, 
    		$verifi_datosFacturacion, 
    		$verifi_id_cliente,
    		$array_agregados,
    		$array, 
    		$vista,
    		$tipo 
    	);
    }

    // Private function que crea el pdf
    private function process_pdf( 
    		$folio, $verifi_logo,	
    		$verifi_datosFacturacion, 
    		$verifi_id_cliente,
    		$array_agregados,
    		$array, 
    		$vista, 
    		$tipo )
    {
        $view = view( $vista )
        	->with( $verifi_logo )
        	->with( $verifi_datosFacturacion )
        	->with( $verifi_id_cliente )
        	->with($array_agregados)
        	->with( $array )
        	->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML( $view );

        if( $tipo == 'online' )
        {
            return $pdf->stream( $folio );
        }
        elseif( $tipo == 'download' )
        {
            return $pdf->download( $folio.'.pdf' );
        }
    }


    // ---------- PRIVATE FUNCTIONS ----------

    // Consultando si hay logotipo
    private function getLogo( $model )
    {
    	if( $model->count() )
    	{
    		$logo = $model->first();
    		$url_logo = '0000server/logo/'.$logo->nameEnc;
    	}
    	else
    	{
    		$logo = null;
    		$url_logo = null;
    	}

    	return [ 'logo' => $logo, 'url_logo' => $url_logo ];
    }


    // Consultando si hay datos de facturacion registrados
    private function getDatosFacturacion( $model )
    {
    	if( $model->count() )
    	{
    		$facturacion = $model->first();
    	}
    	else
    	{
    		$facturacion = null;
    	}

    	return [ 'facturacion' => $facturacion ];
    }


    // Consultando si se seleccionó para un cliente existente, o fue para una persona.
    private function getCliente( $model, $id_cliente )
    {
    	if( $id_cliente != null )
    	{
    		$cliente = $model->findOrFail( $id_cliente );
    	}
    	else
    	{
    		$cliente = null;
    	}

    	return [ 'cliente' => $cliente ];
    }
}
