@extends('Layouts.master')

@section('title', 'Datos de facturación' )

@section('cabecera')
  
    {!! Html::script('tinymce/tinymce.min.js') !!}
    <script>tinymce.init({ selector:'textarea' });</script>

@stop

@section('body')

<section class="content-header">
    
    <h1>Datos de facturación de mi negocio </h1>
     
    <ol class="breadcrumb">
       	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       	<li>Configuración</li>
       	<li class="active">Datos de facturación</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')


    @if( $facturacion == null )

      <div class="box box-primary">

    	   <div class="box-header with-border">
        	    <h3 class="box-title">Registrar datos de facturación</h3>
        	    <div class="box-tools pull-right">
           		   <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           		   <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        	    </div>
    	    </div>
    
    	    {!! Form::open(['url' => 'config/facturacion', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

    		      <div class="box-body">
       	
       			      @include('Layouts.Configuracion.Facturacion.create')

       		    </div>

    		      <!-- Incluimos los botones del formulario -->
    		      @include('Layouts.Sublayouts.buttonsForm')

          {!! Form::close() !!}

	    </div>

    @else

        @include( 'Layouts.Configuracion.Facturacion.show' )

    @endif

</section>

@stop

