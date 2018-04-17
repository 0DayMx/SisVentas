@extends('Layouts.master')

@section('title', 'Modificar categoría | '.$categoria->nombre )

@section('cabecera')
    
    {!! Html::script('tinymce/tinymce.min.js') !!}
    <script>tinymce.init({ selector:'textarea' });</script>

@stop

@section('body')

<section class="content-header">
    
    <h1>Control de categorías <small>MODIFICAR REGISTRO</small> </h1>
     
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Almacén</li>
        <li class="active">Control de categorías | Modificar</li>
    </ol>

</section>

<section class="content">

  @include('Layouts.Sublayouts.alerts')

  <p align="right">
      <a href="{!! url('categorias') !!}" class="btn btn-flat btn-xs btn-primary">CONSULTAR LISTA DE CATEGORÍAS</a>
      <a href="{!! url('categorias',$categoria->id) !!}" class="btn btn-flat btn-xs btn-info">
          DETALLE DE LA CATEGOÍA <i class="glyphicon glyphicon-info-sign"></i>
      </a>     
  </p>

  <div class="box box-warning">

      <div class="box-header with-border">
          <h3 class="box-title">Modificar categoria | 
              <strong class="text-info">{!! $categoria->nombre !!}</strong>
          </h3>
          <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div>
    
      {!! Form::model($categoria,['url' => ['categorias/'.$categoria->id.'/update'], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

          <div class="box-body">
        
              @include('Layouts.Almacen.Categorias.create')

          </div>

        <!-- Incluimos los botones del formulario -->
        @include('Layouts.Sublayouts.buttonsForm')

      {!! Form::close() !!}

  </div>

</section>

@stop