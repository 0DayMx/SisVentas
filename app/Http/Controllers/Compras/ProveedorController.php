<?php

namespace sisventas\Http\Controllers\Compras;

use Illuminate\Http\Request;

use sisventas\Http\Requests;
use sisventas\Http\Controllers\Controller;

use sisventas\Http\Requests\Compras\Proveedor\StoreRequest as StoreProveedor;
use sisventas\Http\Requests\Compras\Proveedor\UpdateRequest as UpdateProveedor;

use sisventas\Modelos\Compras\Proveedor;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $proveedores = Proveedor::all();

        $array = ['proveedores'=>$proveedores];

        $view = 'Compras.Proveedores.index';
        return view($view)->with($array);
    }

   
    public function create()
    {
        $view = 'Compras.Proveedores.create';
        return view($view);
    }

    
    public function store(StoreProveedor $request)
    {
        $proveedor = Proveedor::create($request->all());
        $nombre = $proveedor->razon_social;

        if($proveedor)
        {
            alert()->success(
                'El proveedor '.$nombre.' se ha registrado correctamente.', 
                'Correcto'
            )->html()->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
            alert()->error(
                'El proveedor no se pudo registrar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );  
        }

    }

    
    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);

        $array = ['proveedor'=>$proveedor];

        $view = 'Compras.Proveedores.show';
        return view($view)->with($array);
    }

    
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);

        $array = ['proveedor'=>$proveedor];

        $view = 'Compras.Proveedores.edit';
        return view($view)->with($array);
    }

    
    public function update(UpdateProveedor $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id)->update($request->all());

        if($proveedor)
        {
            alert()->success(
                'El proveedor se ha modificado correctamente.', 
                'Correcto'
            )->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
            alert()->error(
                'El proveedor no se pudo modificar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );  
        }
    }

   
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id)->delete();

        if($proveedor)
        {
           alert()->success(
                'El proveedor se ha eliminado correctamente.', 
                'Correcto'
            )->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
           alert()->error(
                'El proveedor no se pudo eliminar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );  
        }
    }
}
