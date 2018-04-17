@extends('Layouts.master')

@section('title', 'Detalle del proveedor | '.$proveedor->razon_social )

@section('cabecera')
@stop

@section('body')

<section class="content-header">
    
    <h1>Control de proveedores <small>DETALLE DE REGISTRO</small> </h1>
     
    <ol class="breadcrumb">
       	<li><a href="{!! url('/') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
       	<li>Compras</li>
       	<li class="active">Control de proveedores | Detalle</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')

  <p align="right">
      <a href="{!! url('proveedores') !!}" class="btn btn-flat btn-xs btn-primary">CONSULTAR LISTA DE PROVEEDORES</a>
      <a href="{!! url('proveedores/'.$proveedor->id.'/edit') !!}" class="btn btn-flat btn-xs btn-warning">
          MODIFICAR <i class="glyphicon glyphicon-edit"></i>
      </a>	   
  </p>

	<div class="box">

    	<div class="box-header with-border">
        	<h3 class="box-title">Detalle del proveedor | 
              <strong class="text-success">{!! $proveedor->razon_social !!}</strong>
          </h3>
    	</div>

    	<div class="box-body">
       	
       	  @include('Layouts.Compras.Proveedores.show')

      </div>

	</div>

</section>

@stop