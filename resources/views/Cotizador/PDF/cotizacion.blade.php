@extends( 'Cotizador.PDF.masterPDFCot' )

@section('title', 'Cotización | '.$cotizacion->no_cotizacion )

@section( 'body' )
	
	
	<br>
	
	<!-- Incluimos los datos del cliente si es que va dirigido hacia alguno -->
	@include( 'Cotizador.PDF.Layouts.receptor' )


	<p class="parrafo"><strong>At'n {!! $cotizacion->receptor !!}</strong></p>
	<p class="parrafo">
		En atención a su amable solicitud, ponemos a su consideración la siguiente cotización... 
	</p>

	<br>

	<!-- Incluimos la tabla de los artículos agregados -->
	@include( 'Cotizador.PDF.Layouts.articulos' )

	<br>

	<!-- Incluimos el layout de los datos de vigencia y tiempo de entrega -->
	@include( 'Cotizador.PDF.Layouts.condiciones' )

	<br>

	<p class="text-trece" align="justify">
    	Agradecemos su valiosa atención, esperando vernos favorecidos con su pedido.
	</p>


	
	<!-- Para posicionar la firma al final de la hoja -->
	<div class="firma">

		<p align="center">
			<span class="parrafo"><strong>ATENTAMENTE</strong></span>
			<br>

			<span class="parrafo">
            	<strong>{!! Auth::user()->name !!}</strong><br>
        	</span>
        </p>

    </div>

@stop