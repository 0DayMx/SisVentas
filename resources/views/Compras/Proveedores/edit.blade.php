@extends('Layouts.master')

@section('title', 'Modificar proveedor | '.$proveedor->razon_social )

@section('cabecera')
@stop

@section('body')

<section class="content-header">
    
    <h1>Control de proveedores <small>MODIFICAR REGISTRO</small> </h1>
     
    <ol class="breadcrumb">
       	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       	<li>Compras</li>
       	<li class="active">Control de proveedores | Modificar</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')

  <p align="right">
      <a href="{!! url('proveedores') !!}" class="btn btn-flat btn-xs btn-primary">CONSULTAR LISTA DE PROVEEDORES</a>
      <a href="{!! url('proveedores',$proveedor->id) !!}" class="btn btn-flat btn-xs btn-info">
          DETALLE DEL PROVEEDOR <i class="glyphicon glyphicon-info-sign"></i>
      </a>	   
  </p>

	<div class="box box-warning">

    	<div class="box-header with-border">
        	<h3 class="box-title">Modificar proveedor | 
              <strong class="text-info">{!! $proveedor->razon_social !!}</strong>
          </h3>
        	<div class="box-tools pull-right">
           		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           		<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        	</div>
    	</div>
    
    	{!! Form::model($proveedor,['url' => ['proveedores/'.$proveedor->id.'/update'], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

    		  <div class="box-body">
       	
       			  @include('Layouts.Compras.Proveedores.create')

       		</div>

    		<!-- Incluimos los botones del formulario -->
    		@include('Layouts.Sublayouts.buttonsForm')

      {!! Form::close() !!}

	</div>

</section>

@stop