@extends('Layouts.master')

@section('title', 'Datos de facturación' )

@section('cabecera')
  
    {!! Html::script('tinymce/tinymce.min.js') !!}
    <script>tinymce.init({ selector:'textarea' });</script>

@stop

@section('body')

<section class="content-header">
    
    <h1>Datos de facturación de mi negocio <small> MODIFICAR </small> </h1>

     
    <ol class="breadcrumb">
       	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       	<li>Configuración</li>
       	<li class="active">Datos de facturación | Modificar</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')

  <div class="box box-warning">

    	<div class="box-header with-border">
        	<h3 class="box-title">Modificar datos de facturación</h3>
        	<div class="box-tools pull-right">
           		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           		<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        	 </div>
    	</div>
    
    	{!! Form::model($facturacion,['url' => 'config/facturacion/'.$facturacion->id.'/update', 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

    		  <div class="box-body">
       	
       			  @include('Layouts.Configuracion.Facturacion.create')

       		</div>

    		  <!-- Incluimos los botones del formulario -->
    		  @include('Layouts.Sublayouts.buttonsForm')

      {!! Form::close() !!}

	 </div>


</section>

@stop

