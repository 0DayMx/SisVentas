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
            session()->flash('success','La presentación se ha registrado correctamente.');
            return redirect()->back();
        }
        else
        {
            session()->flash('error','La presentación no se pudo registrar.');
            return redirect()->back();
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
            session()->flash('success','La presentación se ha modificado correctamente.');
            return redirect()->back();
        }
        else
        {
            session()->flash('error','La presentación no se pudo modificar.');
            return redirect()->back();
        }

    }

   
    public function destroy($id)
    {
        $presentacion = Presentacion::findOrFail($id)->delete();

        if($presentacion)
        {
            session()->flash('success','La presentación se ha eliminado correctamente.');
            return redirect()->back();
        }
        else
        {
            session()->flash('error','La presentación no se pudo eliminar');
            return redirect()->back();
        }
    }
}
