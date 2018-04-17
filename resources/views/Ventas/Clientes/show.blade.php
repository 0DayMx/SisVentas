@extends('Layouts.master')

@section('title', 'Detalle del cliente | '.$cliente->razon_social )

@section('cabecera')
@stop

@section('body')

<section class="content-header">
    
    <h1>Control de clientes <small>DETALLE DE REGISTRO</small> </h1>
     
    <ol class="breadcrumb">
       	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       	<li>Ventas</li>
       	<li class="active">Control de clientes | Detalle</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')

  <p align="right">
      <a href="{!! url('clientes') !!}" class="btn btn-flat btn-xs btn-primary">CONSULTAR LISTA DE CLIENTES</a>
      <a href="{!! url('clientes/'.$cliente->id.'/edit') !!}" class="btn btn-flat btn-xs btn-warning">
          MODIFICAR <i class="glyphicon glyphicon-edit"></i>
      </a>	   
  </p>

	<div class="box">

    	<div class="box-header with-border">
        	<h3 class="box-title">Detalle del cliente | 
              <strong class="text-success">{!! $cliente->razon_social !!}</strong>
          </h3>
    	</div>

    	<div class="box-body">
       	
       	  @include('Layouts.Ventas.Clientes.show')

      </div>

	</div>

</section>

@stop