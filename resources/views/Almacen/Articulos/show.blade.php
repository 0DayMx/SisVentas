@extends('Layouts.master')

@section('title', 'Detalle del artículo | '.$articulo->nombre )

@section('cabecera')
@stop

@section('body')

<section class="content-header">
    
    <h1>Control de artículos <small>DETALLE DE CATEGORÍA</small> </h1>
     
    <ol class="breadcrumb">
       	<li><a href="{!! url('/') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
       	<li>Almacén</li>
       	<li class="active">Control de artículos | Detalle</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')

  <p align="right">
      <a href="{!! url('articulos') !!}" class="btn btn-flat btn-xs btn-primary">CONSULTAR LISTA DE ARTÍCULOS</a>
      <a href="{!! url('articulos/'.$articulo->id.'/edit') !!}" class="btn btn-flat btn-xs btn-warning">
          MODIFICAR <i class="glyphicon glyphicon-edit"></i>
      </a>	   
  </p>

	<div class="box">

    	<div class="box-header with-border">
        	<h3 class="box-title">Detalle de artículo | 
              <strong class="text-success">{!! $articulo->nombre !!}</strong>
          </h3>
    	</div>

    	<div class="box-body">
       	
       	  @include('Layouts.Almacen.Articulos.show')

      </div>

	</div>

</section>

@stop