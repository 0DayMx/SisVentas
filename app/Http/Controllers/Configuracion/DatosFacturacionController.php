<?php

namespace sisventas\Http\Controllers\Configuracion;

use Illuminate\Http\Request;

use sisventas\Http\Requests;
use sisventas\Http\Controllers\Controller;

use sisventas\Http\Requests\Configuracion\Facturacion\StoreRequest as StoreFacturacion;
use sisventas\Http\Requests\Configuracion\Facturacion\UpdateRequest as UpdateFacturacion;

use sisventas\Modelos\Configuracion\DatosFacturacion;

class DatosFacturacionController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {}

    public function create()
    {
    	$model = new DatosFacturacion;
    	$get_all_data = $model->all();

    	if( $get_all_data->count() )
    	{
    		$facturacion = $model->first();
    	}
    	else
    	{
    		$facturacion = null;
    	}

    	$array = [

    		'facturacion' => $facturacion

    	];

    	$view = 'Configuracion.Facturacion.create';

    	return view( $view )->with( $array );
    }

    public function store( StoreFacturacion $request )
    {
    	$facturacion = DatosFacturacion::create( $request->all() );

    	if( $facturacion )
        {
            alert()->success(
                'Los datos de facturación se registraron correctamente.', 
                'Correcto'
            )->autoclose( 3000 );

            return redirect()->back();
        }
        else
        {
            alert()->error(
                'Los datos de facturación no se pudieron registrar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );

            return redirect()->back();
        }
    }

    public function edit( $id )
    {
    	$facturacion = DatosFacturacion::findOrFail( $id );

    	$array = [

    		'facturacion' => $facturacion

    	];

    	$view = 'Configuracion.Facturacion.edit';
    	return view( $view )->with( $array );
    }


    public function update( UpdateFacturacion $request, $id )
    {
    	$facturacion = DatosFacturacion::findOrFail( $id )->update( $request->all() );

    	if( $facturacion )
        {
            $view = 'config/facturacion/create';
            alert()->success(
                'Los datos de facturación se modificaron correctamente.', 
                'Correcto'
            )->autoclose( 3000 );

            return redirect()->to( $view );
        }
        else
        {
            alert()->error(
                'Los datos de facturación no se pudieron modificar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );

            return redirect()->back();
        }
    }


    public function destroy( $id )
    {
    	$facturacion = DatosFacturacion::findOrFail( $id )->delete();

    	if( $facturacion )
        {
            alert()->success(
                'Los datos de facturación se eliminaron correctamente.', 
                'Correcto'
            )->autoclose( 3000 );

            return redirect()->back();
        }
        else
        {
            alert()->error(
                'Los datos de facturación no se pudieron modificar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );

            return redirect()->back();
        }
    }
}
