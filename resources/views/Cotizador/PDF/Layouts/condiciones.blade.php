<table width="100%" class="tabla-condiciones">
	
	<thead></thead>

	<tbody>
		<tr>
			<td width="25%">Tiempo de entrega:</td>
			<td width="60%">
				{!! $cotizacion->tiempo_entrega !!}
				(A partir de recepción de orden de compra).
			</td>
		</tr>
		<tr>
			<td>Condiciones de pago:</td>
			<td>{!! $cotizacion->getCondicionPago() !!}</td>
		</tr>
		<tr>
			<td>Vigencia:</td>
			<td>{!! $cotizacion->getVigencia() !!}</td>
		</tr>
		<tr>
			<td>Nota:</td>
			<td>
				{!! $cotizacion->nota !!}
			</td>
		</tr>
	</tbody>

</table>