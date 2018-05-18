@extends('Layouts.master')

@section('title', 'Cotizaciones pendientes' )

@section('cabecera')
@stop

@section('body')

<section class="content-header">
    
    <h1>Control de cotizaciones <small>CONSULTAR REGISTRO PENDIENTES</small> </h1>
     
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Cotizador</li>
        <li class="active">Control de cotizaciones | Consultar</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')

  <p align="right">
      <a href="{!! url('cotizacion/create') !!}" class="btn btn-flat btn-xs btn-primary">
          <i class="glyphicon glyphicon-plus"></i> NUEVO REGISTRO
      </a>     
  </p>

  <div class="box box-success">

      <div class="box-header with-border">
          <h3 class="box-title">
              Consultar cotizaciones pendientes | 
              <strong>{!! $cotizaciones->count() !!}</strong> Registros en total
          </h3>
      </div>

      <div class="box-body">
        
        @if($cotizaciones->count())
            @include('Layouts.Cotizador.Cotizacion.index')
        @else
            <div class="alert alert-info">
                <i class="glyphicon glyphicon-info-sign"></i>
                Aún no hay registros de cotizaciones pendientes
            </div>
        @endif

      </div>


  </div>

</section>

@stop

