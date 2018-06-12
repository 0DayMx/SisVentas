@if( $facturacion != null )
	
	<div class="datos-facturacion" >
		<strong>{!! $facturacion->razon_social !!}</strong></<br>
		RFC. {!! $facturacion->rfc !!}<br>
		{!! $facturacion->getDireccion() !!}<br>
		{!! $facturacion->correo !!}<br>
		{!! $facturacion->telefono !!}
	</div>

@endif