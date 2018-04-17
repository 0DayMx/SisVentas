@extends('Layouts.master')

@section('title', 'Nuevo cliente' )

@section('cabecera')
@stop

@section('body')

<section class="content-header">
    
    <h1>Control de clientes <small>NUEVO REGISTRO</small> </h1>
     
    <ol class="breadcrumb">
       	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       	<li>Ventas</li>
       	<li class="active">Control de clientes | Nuevo</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')

  <p align="right">
      <a href="{!! url('clientes') !!}" class="btn btn-flat btn-xs btn-primary">CONSULTAR LISTA DE CLIENTES</a>	   
  </p>

	<div class="box box-primary">

    	<div class="box-header with-border">
        	<h3 class="box-title">Registrar cliente</h3>
        	<div class="box-tools pull-right">
           		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           		<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        	</div>
    	</div>
    
    	{!! Form::open(['url' => 'clientes', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

    		  <div class="box-body">
       	
       			  @include('Layouts.Ventas.Clientes.create')

       		</div>

    		<!-- Incluimos los botones del formulario -->
    		@include('Layouts.Sublayouts.buttonsForm')

      {!! Form::close() !!}

	</div>

</section>

@stop