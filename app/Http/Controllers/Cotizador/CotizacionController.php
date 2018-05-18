<?php

namespace sisventas\Http\Controllers\Cotizador;

use Illuminate\Http\Request;

use sisventas\Http\Requests;
use sisventas\Http\Controllers\Controller;

use sisventas\Http\Requests\Cotizador\Cotizacion\StoreRequest as StoreCotizacion;
use sisventas\Http\Requests\Cotizador\Cotizacion\UpdateRequest as UpdateCotizacion;

use sisventas\Modelos\Ventas\Cliente;
use sisventas\Modelos\Cotizador\Cotizacion;

//Instancias
use sisventas\Modelos\Inst\ProcessCotizacion;

class CotizacionController extends Controller
{
    
    public function index()
    {
        $cotizaciones = Cotizacion::select(
         
            'cot_cotizacion.id',
            'cot_cotizacion.receptor',
            'cot_cotizacion.no_cotizacion as cotizacion',
            'cliente.razon_social as cliente',
            'cot_cotizacion.fecha_emision',
            'cot_cotizacion.vigencia')
            ->leftjoin( 'cliente', function( $join ){
                $join->on( 'cliente.id','=','cot_cotizacion.id_cliente' );
            })
            ->where( 
                [ [ 'cot_cotizacion.aceptada',0 ],[ 'cot_cotizacion.rechazada',0 ] ]
            )->OrderBy( 'cotizacion','DESC' )->get();
        
        $array = [

            'cotizaciones' => $cotizaciones

        ];

        $view = 'Cotizador.Cotizacion.index';
        return view( $view )->with( $array );
    }

   
    public function create()
    {
        $cotizaciones = Cotizacion::select(
         
            'cot_cotizacion.id',
            'cot_cotizacion.no_cotizacion as cotizacion',
            'cot_cotizacion.created_at',
            'cot_cotizacion.receptor',
            'cliente.razon_social as cliente')
            ->leftjoin( 'cliente', function( $join ){
                $join->on( 'cliente.id','=','cot_cotizacion.id_cliente' );
            })
            ->orderBy( 'cotizacion','DESC' )->limit( 5 )->get();

        $clientes = Cliente::lists( 'razon_social','id' );

        $array = [

            'cotizaciones' => $cotizaciones,
            'clientes' => $clientes

        ];

        $view = 'Cotizador.Cotizacion.create';
        return view( $view )->with( $array );
    }

    
    public function store( StoreCotizacion $request )
    {
        // Para almacenar enviamos los inputs, el método, y null en el id, ya que no es update.
        $answer_save_cotizacion = ProcessCotizacion::save_cotizacion( $request->all(), 'store', null );

        if( $answer_save_cotizacion[ 'save' ] == true )
        {
            $folio = $answer_save_cotizacion[ 'folio' ]; // Número de cotización
            $view = 'cotizacion/'.$answer_save_cotizacion[ 'id' ].'/agrega_articulo';
            alert()->success(
                'La cotización N° <strong>'.$folio.'</strong> se registró correctamente. <br><br>
                AHORA AGREGA LOS ARTÍCULOS', 
                'Correcto'
            )->html()->persistent( 'Aceptar' );
            return redirect()->to( $view );
        }
        else
        {
            alert()->error(
                'La cotización no se pudo registrar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );
    
            return redirect()->back();
        }
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit( $id )
    {
        $cotizacion = Cotizacion::findOrFail( $id );
        $clientes = Cliente::lists( 'razon_social','id' );

        $array = [ 

            'clientes' => $clientes,
            'cotizacion' => $cotizacion 

        ];

        $view = 'Cotizador.Cotizacion.edit';
        return view( $view )->with( $array );
    }

   
    public function update( UpdateCotizacion $request, $id )
    {
        // Para almacenar enviamos los inputs, el método update, y el id, para actualizar.
        $answer_save_cotizacion = ProcessCotizacion::save_cotizacion( $request->all(), 'update', $id );

        if( $answer_save_cotizacion[ 'save' ] == true )
        {
            $folio = $answer_save_cotizacion[ 'folio' ]; // Número de cotización
            //$view = 'cotizador/cotizacion/'.$cotizacion->id.'/agrega_articulo';
            alert()->success(
                'La cotización N° <strong>'.$folio.'</strong> se modificó correctamente.', 
                'Correcto'
            )->html()->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
            alert()->error(
                'La cotización no se pudo modificar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );
    
            return redirect()->back();
        }
    }

   
    public function destroy( $id )
    {
        $cotizacion = Cotizacion::findOrFail( $id );
        $folio = $cotizacion->no_cotizacion;
        $destroy = $cotizacion->delete();

        if( $destroy )
        {
            alert()->success(
                'La cotización N° <strong>'.$folio.'</strong> se eliminó correctamente.', 
                'Correcto'
            )->html()->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
            alert()->error(
                'La cotización no se pudo eliminar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );
    
            return redirect()->back();
        }
    }
}
