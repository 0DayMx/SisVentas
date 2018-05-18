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
            alert()->success(
                'La nueva categoría '.$nombre.' se ha registrado correctamente.', 
                'Correcto'
            )->html()->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
            alert()->error(
                'La categoría no se pudo registrar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );
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
            alert()->success(
                'La categoría se ha modificado correctamente.', 
                'Correcto'
            )->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
            alert()->error(
                'La categoría no se pudo modificar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );
        }
    }

    
    public function destroy($id)
    {
        $cat = Categoria::findOrFail($id)->delete();

        if($cat)
        {
           alert()->success(
                'La categoría se ha eliminado correctamente.', 
                'Correcto'
            )->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
            alert()->error(
                'La categoría no se pudo eliminar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );
        }
    }
}
