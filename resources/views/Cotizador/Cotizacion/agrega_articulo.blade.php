@extends('Layouts.master')

@section('title', 'Agregar artículos | '.$cotizacion->no_cotizacion )

@section('cabecera')
    
    {!! Html::script('tinymce/tinymce.min.js') !!}
    <script>tinymce.init({ selector:'textarea' });</script>

@stop

@section('body')

<section class="content-header">
    
    <h1>Control de cotizaciones <small>AGREGAR ARTÍCULOS</small> </h1>
     
    <ol class="breadcrumb">
       	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       	<li>Cotizador</li>
       	<li class="active">Control de cotizaciones | Agregar artículos</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')

	<div class="box box-primary">

    	<div class="box-header with-border">
        	<h3 class="box-title">Agregar artículos a cotización
              |
              {!! $cotizacion->no_cotizacion !!}
              | 
              {!! Form::submit('Detalle de esta cotización',[
                  'class'=>'btn btn-xs btn-info',
                  'data-toggle'=>'modal',
                  'data-target'=>'#modal-detalle-cot'
              ]) !!}
          </h3>
        	<div class="box-tools pull-right">
           		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           		<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        	</div>
    	</div>

      <br>
      
      <div class="well-default">

          <p class="text-info"> - ARTÍCULOS AGREGADOS - ( {!! $articulos_agregados->count() !!} )</p>

          <!-- Incluimos los articulos agregados a la cotizacion si es que los hay -->
          @if( $articulos_agregados->count() )
              @include( 'Layouts.Cotizador.Cotizacion.lista_articulos_agregados' )
          @else
              <p class="text-primary">
                  Agregue debajo los artículos para esta cotización...
              </p>
         @endif
      </div>


      <div class="box-body">
   	
          <!-- Incluimos la tabla de articulos para agregar a la cotizacion -->
          {!! Form::open([
              'url' => 'cotizacion/'.$cotizacion->id.'/agrega_articulo',
              'method' => 'POST']) 
          !!}

              <p class="text-info"> - Seleccione los artículos e ingrese la cantidad - </p>

              @include( 'Layouts.Cotizador.Cotizacion.lista_agrega_articulos' )

          {!! Form::close() !!}

      </div>
     
	</div>

</section>

<!-- Incluimosel modal del detalle de la cotizacion -->
@include( 'Layouts.Cotizador.Cotizacion.modal_detalle_cot' )

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