@extends('Layouts.master')

@section('title', 'Detalle del lote | '.$lote->nombre )

@section('cabecera')
@stop

@section('body')

<section class="content-header">
    
    <h1>Control de lotes <small>DETALLE DEL LOTE</small> </h1>
     
    <ol class="breadcrumb">
       	<li><a href="{!! url('/') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
       	<li>Almacén</li>
       	<li class="active">Control de lotes | Detalle</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')

  <p align="right">
      <a href="{!! url('lotes') !!}" class="btn btn-flat btn-xs btn-primary">CONSULTAR LISTA DE LOTES</a>
      <a href="{!! url('lotes/'.$lote->id.'/edit') !!}" class="btn btn-flat btn-xs btn-warning">
          MODIFICAR <i class="glyphicon glyphicon-edit"></i>
      </a>	   
  </p>

	<div class="box">

    	<div class="box-header with-border">
        	<h3 class="box-title">Detalle del lote | 
              <strong class="text-success">{!! $lote->nombre !!}</strong>
          </h3>
    	</div>

    	<div class="box-body">
       	
       	  @include('Layouts.Almacen.Lotes.show')

      </div>

	</div>

</section>

@stop