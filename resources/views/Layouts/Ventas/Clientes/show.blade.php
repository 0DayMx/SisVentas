<h5>
	<span class="label label-info">Creado:</span> {!! $cliente->created_at !!} | 
	<span class="label label-info">Modificado:</span> 
	{!! $cliente->updated_at !!} (<strong><i>{!! $cliente->updated_at->diffForHumans() !!}</strong> aprox.</i>)
</h5>

<br>

<div class="table-responsive">

	<table class="table table-responsive table-bordered table-striped table-condensed">

		<thead class="head-tabla-cielo">
			
			<tr>
				<th colspan="4" style="background-color: #50DED8;"><center>{!! $cliente->razon_social !!}</center></th>
			</tr>

		</thead>

		<tbody class="body-tabla-cielo">
			
			<tr>
				<td><strong>Razón social</strong></td>
				<td>{!! $cliente->razon_social !!}</td>
			
				<td><strong>Régimen fiscal</strong></td>
				<td>{!! $cliente->regimen_fiscal !!}</td>
			</tr>

			<tr>
				<td><strong>Tipo de documento</strong></td>
				<td>{!! $cliente->getTipoDocumento() !!}</td>
			
				<td><strong>Número de documento</strong></td>
				<td>{!! $cliente->numero_documento !!}</td>
			</tr>

			<tr>
				<td><strong>Dirección</strong></td>
				<td>{!! $cliente->direccion !!}</td>

				<td><strong>Teléfono</strong></td>
				<td>{!! $cliente->telefono !!}</td>
			</tr>

			<tr>
				<td><strong>Correo</strong></td>
				<td>{!! $cliente->correo !!}</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>

		</tbody>

	</table>

</div>