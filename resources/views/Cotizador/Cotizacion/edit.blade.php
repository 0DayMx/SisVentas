@extends('Layouts.master')

@section('title', 'Modificar cotización | '.$cotizacion->no_cotizacion )

@section('cabecera')
    
    {!! Html::script('tinymce/tinymce.min.js') !!}
    <script>tinymce.init({ selector:'textarea' });</script>

@stop

@section('body')

<section class="content-header">
    
    <h1>Control de cotizaciones <small>MODIFICAR REGISTRO</small> </h1>
     
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Cotizador</li>
        <li class="active">Control de cotizaciones | Modificar</li>
    </ol>

</section>


<section class="content">

  @include('Layouts.Sublayouts.alerts')

  <p align="right">
      <a href="{!! url('cotizacion/'.$cotizacion->id.'/agrega_articulo') !!}" class="btn btn-flat btn-xs btn-primary">
          <i class="glyphicon glyphicon-shopping-cart"></i> Agregar artículos
      </a>         
  </p>

  <div class="box box-warning">

      <div class="box-header with-border">
          <h3 class="box-title">Modificar cotizacion | 
              <strong class="text-info">{!! $cotizacion->no_cotizacion !!}</strong>
          </h3>
          <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div>
    
      {!! Form::model( $cotizacion,[ 'url' => [ 'cotizacion/'.$cotizacion->id.'/update' ], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

          <div class="box-body">
        
              @include('Layouts.Cotizador.Cotizacion.create')

          </div>

        <!-- Incluimos los botones del formulario -->
        @include('Layouts.Sublayouts.buttonsForm')

      {!! Form::close() !!}

  </div>

</section>

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