<?php

namespace sisventas\Http\Controllers\Almacen;

use Illuminate\Http\Request;

use sisventas\Http\Requests;
use sisventas\Http\Controllers\Controller;

use sisventas\Http\Requests\Almacen\Presentacion\StoreRequest as StorePresentacion;
use sisventas\Http\Requests\Almacen\Presentacion\UpdateRequest as UpdatePresentacion;

use sisventas\Modelos\Almacen\Presentacion;

class PresentacionController extends Controller
{
    public function index()
    {
        $presentaciones = Presentacion::all();

        $array = ['presentaciones'=>$presentaciones];

        $view = 'Almacen.Presentaciones.index';
        return view($view)->with($array);
    }

    public function create()
    {
        $view = 'Almacen.Presentaciones.create';
        return view($view);
    }

    
    public function store(StorePresentacion $request)
    {
        $presentacion = Presentacion::create($request->all());

        if($presentacion)
        {
            alert()->success(
                'La presentación se ha registrado correctamente.', 
                'Correcto'
            )->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
            alert()->error(
                'La presentación no se pudo registrar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );
        }
    }

   
    public function show($id)
    {
        $presentacion = Presentacion::findOrFail($id);

        $array = ['presentacion'=>$presentacion];

        $view = 'Almacen.Presentaciones.show';
        return view($view)->with($array);
    }

   
    public function edit($id)
    {
        $presentacion = Presentacion::findOrFail($id);

        $array = ['presentacion'=>$presentacion];

        $view ='Almacen.Presentaciones.edit';
        return view($view)->with($array);
    }

    
    public function update(UpdatePresentacion $request, $id)
    {
        $presentacion = Presentacion::findOrFail($id)->update($request->all());

        if($presentacion)
        {
            alert()->success(
                'La presentación se ha modificado correctamente.', 
                'Correcto'
            )->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
            alert()->error(
                'La presentación no se pudo modificar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );
        }

    }

   
    public function destroy($id)
    {
        $presentacion = Presentacion::findOrFail($id)->delete();

        if($presentacion)
        {
            alert()->success(
                'La presentación se ha eliminado correctamente.', 
                'Correcto'
            )->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
            alert()->error(
                'La presentación no se pudo eliminar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );
        }
    }
}
