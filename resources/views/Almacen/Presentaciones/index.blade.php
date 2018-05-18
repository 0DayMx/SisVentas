@extends('Layouts.master')

@section('title', 'Lista de presentaciones' )

@section('cabecera')
@stop

@section('body')

<section class="content-header">
    
    <h1>Control de presentaciones<small>CONSULTAR REGISTROS</small> </h1>
     
    <ol class="breadcrumb">
       	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       	<li>Almacén</li>
       	<li class="active">Control de presentaciones | Consultar</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')

  <p align="right">
      <a href="{!! url('presentaciones/create') !!}" class="btn btn-flat btn-xs btn-primary">
          <i class="glyphicon glyphicon-plus"></i> NUEVO REGISTRO
      </a>	   
  </p>

	<div class="box box-success">

    	<div class="box-header with-border">
        	<h3 class="box-title">
              Consultar presentaciones | 
              <strong>{!! $presentaciones->count() !!}</strong> Registros en total
          </h3>
    	</div>

    	<div class="box-body">
       	
      	@if($presentaciones->count())
            @include('Layouts.Almacen.Presentaciones.index')
        @else
            <div class="alert alert-info">
                <i class="glyphicon glyphicon-info-sign"></i>
                Aún no hay registros de presentaciones
            </div>
        @endif

      </div>


	</div>

</section>

@stop


@section('scripts') 

