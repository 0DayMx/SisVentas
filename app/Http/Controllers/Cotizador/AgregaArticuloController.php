<?php

namespace sisventas\Http\Controllers\Cotizador;

use Illuminate\Http\Request;

use sisventas\Http\Requests;
use sisventas\Http\Controllers\Controller;

use sisventas\Modelos\Cotizador\Cotizacion;
use sisventas\Modelos\Cotizador\CotArticulo;
use sisventas\Modelos\Almacen\Lote;
use sisventas\Modelos\Ventas\Cliente;

// Instancias
use sisventas\Modelos\Inst\ProcessAgregaArticulo;


class AgregaArticuloController extends Controller
{
    public function create( $id )
    {
        $cotizacion = Cotizacion::findOrFail( $id );
        $cliente = Cliente::findOrFail( $cotizacion->id_cliente );
        $__varIva = $cotizacion->iva;
        $__varDescuento = $cotizacion->descuento;

    	//Agregamos la lista de los artículos agregados a la cotización contenidos en los lotes.
        $articulos_agregados = CotArticulo::select(
                'cot_articulo.id',
                'cot_articulo.cantidad',
                'articulo.nombre as articulo',
                'articulo.descripcion as descripcion_articulo',
                'lote.precio_venta',
                'lote.nombre as lote')
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
        $total_sin_descuento = number_format( $answer_taxes[ 'total_sin_descuento' ],2,'.',',' );
        $a_descontar = number_format( $answer_taxes[ 'a_descontar' ],2,'.',',' );
        $total = number_format( $answer_taxes[ 'total' ],2,'.',',' );

        $array_agregados = [

            'articulos_agregados' => $articulos_agregados,
            'subtotal' => $subtotal,
            'iva' => $iva,
            'total_sin_descuento' => $total_sin_descuento,
            'a_descontar' =>  $a_descontar,
            'total' => $total

        ];

    	// Enviamos la lista de los lotes que contienen los articulos para agregar a la cotizacion
        $agrega_articulos = Lote::select(
            
            'lote.id',
            'lote.nombre as lote',
            'articulo.nombre as articulo',
            'categoria.nombre as categoria_articulo',
            'presentacion.nombre as presentacion_articulo',
            'articulo.descripcion as descripcion_articulo',
            'lote.precio_venta')
        ->join( 'articulo','articulo.id','=','lote.id_articulo' )
        ->join( 'categoria','categoria.id','=','articulo.id_categoria' )
        ->join( 'presentacion','presentacion.id','=','articulo.id_presentacion' )
        ->get();

        $array = [
            'cotizacion' => $cotizacion,
            'agrega_articulos' => $agrega_articulos,
            'cliente' => $cliente
        ];

        $view = 'Cotizador.Cotizacion.agrega_articulo';
        return view( $view )->with( $array_agregados )->with( $array );
    }



    public function store( Request $request, $id )
    {
        if( isset( $_POST[ 'BtnAgregar' ] ) )
        {
            if( empty( $_POST[ 'articulos' ] ) )
            {
                alert()->info(
                    'No se ha seleccionado ningún artículo para agregar', 
                    'Información'
                )->persistent( '¡Entendido!' );
                return redirect()->back();
            }
            else
            {
                foreach( $_POST[ 'articulos' ] as $item )
                {
                    $articulo = new CotArticulo;
                    $articulo->id_cotizacion = $id;
                    $articulo->cantidad = ( empty( $request->cantidad ) ) ? 1 : $request->cantidad;
                    $articulo->id_lote = $item;
                    $articulo->save();                   
                }

                if( $articulo->save() )
                {
                    alert()->success(
                        'Los '.count( $_POST[ 'articulos' ] ).' artículos seleccionados se registraron correctamente.', 
                        'Correcto'
                    )->html()->autoclose( 3000 );
                    return redirect()->back();
                }
                else
                {
                    alert()->error(
                        'Los artículos seleccionados no se pudieron agregar.',
                        'Intenta nuevamente'
                    )->persistent( 'Cerrar' );
                }
            }
        }
    }




    public function destroy( $id )
    {
        if( isset( $_POST[ 'BtnEliminar' ] ) )
        {
            if( empty( $_POST[ 'articulos' ] ) )
            {
                alert()->info(
                    'No se ha seleccionado ningún artículo de los agregados para eliminar', 
                    'Información'
                )->persistent( '¡Entendido!' );
                return redirect()->back();
            }
            else
            {
                $model = new CotArticulo;
                $destroy_articulos = $model->whereIn( 'id', $_POST[ 'articulos' ] )->delete();

                if( $destroy_articulos )
                {
                   alert()->success(
                        'Los '.count( $_POST[ 'articulos' ] ).' artículos seleccionados se eliminaron correctamente.', 
                        'Correcto'
                    )->html()->autoclose( 3000 );
                    return redirect()->back();
                }
                else
                {
                    alert()->error(
                        'Los artículos seleccionados no se pudieron eliminar.',
                        'Intenta nuevamente'
                    )->persistent( 'Cerrar' );
                }
            }
        }
    }
}
