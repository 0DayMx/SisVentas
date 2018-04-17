<?php

namespace sisventas\Http\Controllers\Almacen;

use Illuminate\Http\Request;

use sisventas\Http\Requests;
use sisventas\Http\Controllers\Controller;

use sisventas\Http\Requests\Almacen\Articulo\StoreRequest as StoreArticulo;
use sisventas\Http\Requests\Almacen\Articulo\UpdateRequest as UpdateArticulo;

use sisventas\Modelos\Almacen\Articulo;
use sisventas\Modelos\Almacen\Categoria;
use sisventas\Modelos\Almacen\Presentacion;

class ArticuloController extends Controller
{
    
    public function index()
    {
        $articulos = Articulo::select(
            'articulo.id',
            'articulo.nombre as articulo',
            'categoria.nombre as categoria',
            'presentacion.nombre as presentacion')
            ->join('categoria','categoria.id','=','articulo.id_categoria')
            ->join('presentacion','presentacion.id','=','articulo.id_presentacion')
            ->get();

        $array = ['articulos'=>$articulos];

        $view = 'Almacen.Articulos.index';
        return view($view)->with($array);
    }

   
    public function create()
    {
        $categorias = Categoria::lists('nombre','id');
        $presentaciones = Presentacion::lists('nombre','id');

        $array = [

            'categorias' => $categorias,
            'presentaciones' => $presentaciones

        ];

        $view = 'Almacen.Articulos.create';
        return view($view)->with($array);
    }

    
    public function store(StoreArticulo $request)
    {
        $articulo = Articulo::create($request->all());

        if($articulo)
        {
            session()->flash('success','El artículo se ha registrado correctamente.');
            return redirect()->back();
        }
        else
        {
            session()->flash('error','El artículo no se pudo registrar');
            return redirect()->back();
        }
    }

    
    public function show($id)
    {
        $articulo = Articulo::findOrFail($id);
        $categoria = Categoria::findOrFail($articulo->id_categoria);
        $presentacion = Presentacion::findOrFail($articulo->id_presentacion);

        $array = [

            'categoria' => $categoria,
            'presentacion' => $presentacion,
            'articulo'=>$articulo

        ];

        $view = 'Almacen.Articulos.show';
        return view($view)->with($array);
    }

    
    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);
        $categorias = Categoria::lists('nombre','id');
        $presentaciones = Presentacion::lists('nombre','id');

        $array = [

            'categorias' => $categorias,
            'presentaciones' => $presentaciones,
            'articulo'=>$articulo

        ];

        $view = 'Almacen.Articulos.edit';
        return view($view)->with($array);
    }

    
    public function update(UpdateArticulo $request, $id)
    {
        $articulo = Articulo::findOrFail($id)->update($request->all());

        if($articulo)
        {
            session()->flash('success','El artículo se ha modificado correctamente.');
            return redirect()->back();
        }
        else
        {
            session()->flash('error','El artículo no se pudo modificar.');
            return redirect()->back();
        }
    }

    
    public function destroy($id)
    {
        $articulo = Articulo::findOrFail($id)->delete();

        if($articulo)
        {
            session()->flash('success','El artículo se ha eliminado correctamente.');
            return redirect()->back();
        }
        else
        {
            session()->flash('error','El artículo no se pudo eliminar');
            return redirect()->back();
        }
    }
}
