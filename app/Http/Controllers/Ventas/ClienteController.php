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
            session()->flash('success','El cliente '.$nombre.' se ha registrado correctamente.');
            return redirect()->back();
        }
        else
        {
            session()->flash('error','El cliente no se pudo registrar.');
            return redirect()->back();
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
            session()->flash('success','El cliente se ha actualizado correctamente.');
            return redirect()->back();
        }
        else
        {
            session()->flash('error','El cliente no se pudo actualizar.');
            return redirect()->back();
        }
    }

   
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id)->delete();

        if($cliente)
        {
            session()->flash('success','El cliente se ha eliminado correctamente.');
            return redirect()->back();
        }
        else
        {
            session()->flash('error','El cliente no se pudo eliminar');
            return redirect()->back();
        }
    }
}
