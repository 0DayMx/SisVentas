@if( $cliente != null )
	
	<div class="panel-gris">

		<div class="datos-cliente">
		
			<table width="50%">
				<tbody>
					<tr>
						<td width="10%">Empresa</td>
						<td width="40%">{!! $cliente->razon_social !!}</td>
					</tr>
					<tr>
						<td>Dirección</td>
						<td>{!! $cliente->direccion !!}</td>
					</tr>
					<tr>
						<td>Teléfono</td>
						<td>{!! $cliente->telefono !!}</td>
					</tr>
				</tbody>
			</table>

		</div>

	</div>

@endif

