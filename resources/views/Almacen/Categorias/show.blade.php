@extends('Layouts.master')

@section('title', 'Detalle de la categoría | '.$cat->nombre )

@section('cabecera')
@stop

@section('body')

<section class="content-header">
    
    <h1>Control de categorías <small>DETALLE DE CATEGORÍA</small> </h1>
     
    <ol class="breadcrumb">
       	<li><a href="{!! url('/') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
       	<li>Almacen</li>
       	<li class="active">Control de categorías | Detalle</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')

  <p align="right">
      <a href="{!! url('categorias') !!}" class="btn btn-flat btn-xs btn-primary">CONSULTAR LISTA DE CATEGORÍAS</a>
      <a href="{!! url('categorias/'.$cat->id.'/edit') !!}" class="btn btn-flat btn-xs btn-warning">
          MODIFICAR <i class="glyphicon glyphicon-edit"></i>
      </a>	   
  </p>

	<div class="box">

    	<div class="box-header with-border">
        	<h3 class="box-title">Detalle de categoría | 
              <strong class="text-success">{!! $cat->nombre !!}</strong>
          </h3>
    	</div>

    	<div class="box-body">
       	
       	  @include('Layouts.Almacen.Categorias.show')

      </div>

	</div>

</section>

@stop