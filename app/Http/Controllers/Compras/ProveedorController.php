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
            session()->flash('success','El proveedor '.$nombre.' se ha registrado correctamente.');
            return redirect()->back();
        }
        else
        {
            session()->flash('success','El proveedor no se pudo registrar.');
            return redirect()->back();   
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
            session()->flash('success','El proveedor se ha actualizado correctamente.');
            return redirect()->back();
        }
        else
        {
            session()->flash('error','El proveedor no se pudo actualizar.');
            return redirect()->back();
        }
    }

   
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id)->delete();

        if($proveedor)
        {
            session()->flash('success','El proveedor se ha eliminado correctamente.');
            return redirect()->back();
        }
        else
        {
            session()->flash('error','El proveedor no se pudo eliminar.');
            return redirect()->back();
        }
    }
}
