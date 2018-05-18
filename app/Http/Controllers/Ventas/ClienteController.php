<?php

namespace sisventas\Http\Controllers\Ventas;

use Illuminate\Http\Request;

use sisventas\Http\Requests;
use sisventas\Http\Controllers\Controller;

use sisventas\Http\Requests\Ventas\Cliente\StoreRequest as StoreCliente;
use sisventas\Http\Requests\Ventas\Cliente\UpdateRequest as UpdateCliente;

use sisventas\Modelos\Ventas\Cliente;

class ClienteController extends Controller
{
    
    public function index()
    {
        $clientes = Cliente::all();

        $array = ['clientes'=>$clientes];

        $view = 'Ventas.Clientes.index';
        return view($view)->with($array);
    }

   
    public function create()
    {
        $view = 'Ventas.Clientes.create';
        return view($view);
    }

    
    public function store(StoreCliente $request)
    {
        $cliente = Cliente::create($request->all());
        $nombre = $cliente->razon_social;

        if($cliente)
        {
            alert()->success(
                'El cliente '.$nombre.' se ha registrado correctamente.', 
                'Correcto'
            )->html()->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
           alert()->error(
                'El cliente no se pudo registrar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );
        }
    }

    
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);

        $array = ['cliente'=>$cliente];

        $view = 'Ventas.Clientes.show';
        return view($view)->with($array);
    }

    
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);

        $array = ['cliente'=>$cliente];

        $view = 'Ventas.Clientes.edit';
        return view($view)->with($array);
    }

   
    public function update(UpdateCliente $request, $id)
    {
        $cliente = Cliente::findOrFail($id)->update($request->all());

        if($cliente)
        {
            alert()->success(
                'El cliente se ha actualizado correctamente.', 
                'Correcto'
            )->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
            alert()->error(
                'El cliente no se pudo actualizar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );
        }
    }

   
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id)->delete();

        if($cliente)
        {
            alert()->success(
                'El cliente se ha aliminado correctamente.', 
                'Correcto'
            )->autoclose( 3000 );
            return redirect()->back();
        }
        else
        {
            alert()->error(
                'El cliente no se pudo eliminar.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );
        }
    }
}
