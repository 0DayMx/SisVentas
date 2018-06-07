@extends('Layouts.master')

@section('title', 'Logotipo de negocio' )

@section('cabecera')
  
    {!! Html::script('tinymce/tinymce.min.js') !!}
    <script>tinymce.init({ selector:'textarea' });</script>

@stop

@section('body')

<section class="content-header">
    
    <h1>Logotipo de mi negocio </h1>
     
    <ol class="breadcrumb">
       	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       	<li>Configuración</li>
       	<li class="active">Logotipo de mi negocio</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')

  @if( $logo == null )

      <div class="box box-primary">

    	    <div class="box-header with-border">
        	    <h3 class="box-title">Cargar logotipo de negocio</h3>
        	    <div class="box-tools pull-right">
           		    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           		    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        	    </div>
    	    </div>
    
    	    {!! Form::open(['url' => 'config/logo', 'method' => 'POST', 'class' => 'form-horizontal', 'files' => 'true']) !!}

    		      <div class="box-body">
       	
       			      @include('Layouts.Configuracion.Logo.create')

       		    </div>

    		      <!-- Incluimos los botones del formulario -->
    		      @include('Layouts.Sublayouts.buttonsForm')

          {!! Form::close() !!}

	    </div>

  @else

      @include( 'Layouts.Configuracion.Logo.show' )

  @endif

</section>

@stop



@section( 'scripts' )

<script>
    $("#img_logo").fileinput({
        uploadAsync: false,
        minFileCount: 1,
        maxFileCount: 1,
        allowedFileExtensions : ['jpg', 'jpeg', 'png','gif'],
        showUpload: false,
        maxFileSize: 10000,
        removeClass: 'btn btn-default',
        browseClass: 'btn btn-primary',
        showRemove: true,
    });
</script>

@stop


