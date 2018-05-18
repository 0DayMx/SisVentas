@extends('Layouts.master')

@section('title', 'Nueva cotización' )

@section('cabecera')
    
    {!! Html::script('tinymce/tinymce.min.js') !!}
    <script>tinymce.init({ selector:'textarea' });</script>

@stop

@section('body')

<section class="content-header">
    
    <h1>Control de cotizaciones <small>NUEVO REGISTRO</small> </h1>
     
    <ol class="breadcrumb">
       	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       	<li>Cotizador</li>
       	<li class="active">Control de cotizaciones | Nuevo</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')

	<div class="box box-primary">

    	<div class="box-header with-border">
        	<h3 class="box-title">Registrar cotización
              | 
              {!! Form::submit('Últimos folios registrados',[
                  'class'=>'btn btn-xs btn-info',
                  'data-toggle'=>'modal',
                  'data-target'=>'#modal-last-records'
              ]) !!}
          </h3>
        	<div class="box-tools pull-right">
           		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           		<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        	</div>
    	</div>
    
    	{!! Form::open(['url' => 'cotizacion', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

    		  <div class="box-body">
       	
       		    @include( 'Layouts.Cotizador.Cotizacion.create' )	 

       		</div>

    		<!-- Incluimos los botones del formulario -->
    		@include('Layouts.Sublayouts.buttonsForm')

      {!! Form::close() !!}

	</div>

</section>

<!-- Inlcuimos el modal para los últimos folios -->
@include( 'Layouts.Cotizador.Cotizacion.modal_folios' )

@stop

@section('scripts')
    
    <script type="text/javascript">
    
    $(document).ready(function(){
    
        var $fecha_emision = $("#fecha_emision");

        $fecha_emision.bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD',
            clearButton: true,
            weekStart: 1,
            time: false
        });

       
    });

</script>
@stop