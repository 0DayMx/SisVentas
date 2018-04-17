<?php

namespace sisventas\Http\Controllers\Almacen;

use Illuminate\Http\Request;

use sisventas\Http\Requests;
use sisventas\Http\Controllers\Controller;

use sisventas\Http\Requests\Almacen\Categoria\StoreRequest as StoreCategoria;
use sisventas\Http\Requests\Almacen\Categoria\UpdateRequest as UpdateCategoria;

use sisventas\Modelos\Almacen\Categoria;

class CategoriaController extends Controller
{
   
    public function index()
    {
        $categorias = Categoria::all();

        $array = ['categorias'=>$categorias];

        $view = 'Almacen.Categorias.index';
        return view($view)->with($array);
    }

    
    public function create()
    {
        $view = 'Almacen.Categorias.create';
        return view($view);
    }

    
    public function store(StoreCategoria $request)
    {
        $cat = Categoria::create($request->all());
        $nombre = $cat->nombre;

        if($cat)
        {
            session()->flash('success','La nueva categoría '.$nombre.' se ha registrado correctamente.');
            return redirect()->back();
        }
        else
        {
            session()->flash('error','La categoría no se pudo registrar.');
            return redirect()->back();
        }
    }

    
    public function show($id)
    {
        $cat = Categoria::findOrFail($id);
        $array = ['cat'=>$cat];

        $view ='Almacen.Categorias.show';
        return view($view)->with($array);
    }

    
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);

        $array = ['categoria'=>$categoria];

        $view = 'Almacen.Categorias.edit';
        return view($view)->with($array);
    }

   
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id)->update($request->all());

        if($categoria)
        {
            session()->flash('success','La categoría se ha actualizado correctamente.');
            return redirect()->back();
        }
        else
        {
            session()->flash('error','La categoría no se pudo actualizar.');
            return redirect()->back();
        }
    }

    
    public function destroy($id)
    {
        $cat = Categoria::findOrFail($id)->delete();

        if($cat)
        {
            session()->flash('success','La categoría se ha eliminado correctamente.');
            return redirect()->back();
        }
        else
        {
            session()->flash('error','La categoría no se pudo eliminar.');
            return redirect()->back();
        }
    }
}
