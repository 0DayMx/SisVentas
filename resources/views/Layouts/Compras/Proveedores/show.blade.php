<h5>
	<span class="label label-info">Creado:</span> {!! $proveedor->created_at !!} | 
	<span class="label label-info">Modificado:</span> 
	{!! $proveedor->updated_at !!} (<strong><i>{!! $proveedor->updated_at->diffForHumans() !!}</strong> aprox.</i>)
</h5>

<br>

<div class="table-responsive">

	<table class="table table-responsive table-bordered table-striped table-condensed">

		<thead>
			
			<tr>
				<th colspan="4" style="background-color: #50DED8;"><center>{!! $proveedor->razon_social !!}</center></th>
			</tr>

		</thead>

		<tbody>
			
			<tr>
				<td><strong>Razón social</strong></td>
				<td>{!! $proveedor->razon_social !!}</td>
			
				<td><strong>Correo</strong></td>
				<td>{!! $proveedor->correo !!}</td>
				
			</tr>

			<tr>
				<td><strong>Tipo de documento</strong></td>
				<td>{!! $proveedor->getTipoDocumento() !!}</td>
			
				<td><strong>Número de documento</strong></td>
				<td>{!! $proveedor->numero_documento !!}</td>
			</tr>

			<tr>
				<td><strong>Dirección</strong></td>
				<td>{!! $proveedor->direccion !!}</td>

				<td><strong>Teléfono</strong></td>
				<td>{!! $proveedor->telefono !!}</td>
			</tr>

		</tbody>

	</table>

</div>