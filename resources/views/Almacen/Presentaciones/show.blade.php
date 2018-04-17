@extends('Layouts.master')

@section('title', 'Detalle de la presentación | '.$presentacion->nombre )

@section('cabecera')
@stop

@section('body')

<section class="content-header">
    
    <h1>Control de presentaciones <small>DETALLE DE PRESENTACIÓN</small> </h1>
     
    <ol class="breadcrumb">
       	<li><a href="{!! url('/') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
       	<li>Almacén</li>
       	<li class="active">Control de categorías | Detalle</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')

  <p align="right">
      <a href="{!! url('presentaciones') !!}" class="btn btn-flat btn-xs btn-primary">CONSULTAR LISTA DE PRESENTACIONES</a>
      <a href="{!! url('presentaciones/'.$presentacion->id.'/edit') !!}" class="btn btn-flat btn-xs btn-warning">
          MODIFICAR <i class="glyphicon glyphicon-edit"></i>
      </a>	   
  </p>

	<div class="box">

    	<div class="box-header with-border">
        	<h3 class="box-title">Detalle de presentacion | 
              <strong class="text-success">{!! $presentacion->nombre !!}</strong>
          </h3>
    	</div>

    	<div class="box-body">
       	
       	  @include('Layouts.Almacen.Presentaciones.show')

      </div>

	</div>

</section>

@stop