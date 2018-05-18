<?php

namespace sisventas\Http\Controllers\Almacen;

use Illuminate\Http\Request;

use sisventas\Http\Requests;
use sisventas\Http\Controllers\Controller;

use sisventas\Http\Requests\Almacen\Lote\StoreRequest as StoreLote;
use sisventas\Http\Requests\Almacen\Lote\UpdateRequest as UpdateLote;

use sisventas\Modelos\Almacen\Lote;
use sisventas\Modelos\Almacen\Articulo;
use sisventas\Modelos\Compras\Proveedor;

class LoteController extends Controller
{
    
    public function index()
    {
        $lotes = Lote::select(
            'lote.id',
            'lote.nombre as lote',
            'articulo.nombre as articulo',
            'lote.precio_compra as compra',
            'lote.precio_venta as venta',
            'lote.tipo_moneda as tipo_moneda',
            'lote.tipo_cambio',
            'proveedor.razon_social as proveedor')
        ->join('articulo','articulo.id','=','lote.id_articulo')
        ->join('proveedor','proveedor.id','=','lote.id_proveedor')
        ->get();

        $array = ['lotes'=>$lotes];

        $view = 'Almacen.Lote.index';
        return view($view)->with($array);
    }

    
    public function create()
    {
        $articulos = Articulo::get()->lists('nombre','id');
        $proveedores = Proveedor::lists('razon_social','id');
        
        $array = [

            'articulos'=>$articulos,
            'proveedores'=>$proveedores

        ];

        $view = 'Almacen.Lote.create';
        return view($view)->with($array);
    }

    
    public function store(StoreLote $request)
    {
        $lote = Lote::create($request->all());

        if($lote)
        {
            alert()->success(
                'El lote se registró correctamente.', 
                'Correcto'
            )->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
            alert()->error(
                'El lote no se pudo registrar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );
        }
    }

    
    public function show($id)
    {
        $lote = Lote::findOrFail($id);
        $articulo = Articulo::findOrFail($lote->id_articulo);
        $proveedor = Proveedor::findOrFail($lote->id_proveedor);

         $array = [

            'articulo'=>$articulo,
            'proveedor'=>$proveedor,
            'lote'=>$lote

        ];

        $view = 'Almacen.Lote.show';
        return view($view)->with($array);
    }

    
    public function edit($id)
    {
        $articulos = Articulo::get()->lists('nombre','id');
        $proveedores = Proveedor::lists('razon_social','id');

        $lote = Lote::findOrFail($id);

        $array = [

            'articulos'=>$articulos,
            'proveedores'=>$proveedores,
            'lote'=>$lote

        ];

        $view = 'Almacen.Lote.edit';
        return view($view)->with($array);
    }

    
    public function update(UpdateLote $request, $id)
    {
        $lote = Lote::findOrFail($id)->update($request->all());

        if($lote)
        {
            alert()->success(
                'El lote se ha modificado correctamente.', 
                'Correcto'
            )->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
            alert()->error(
                'El lote no se pudo modificar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );
        }
    }

   
    public function destroy($id)
    {
        $lote = Lote::findOrFail($id)->delete();

        if($lote)
        {
            alert()->success(
                'El lote se ha eliminado correctamente.', 
                'Correcto'
            )->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
            alert()->error(
                'El lote no se pudo eliminar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );
        }
    }
}
