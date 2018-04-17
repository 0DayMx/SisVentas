<h5>
	<span class="label label-info">Creado:</span> {!! $presentacion->created_at !!} | 
	<span class="label label-info">Modificado:</span> 
	{!! $presentacion->updated_at !!} (<strong><i>{!! $presentacion->updated_at->diffForHumans() !!}</strong> aprox.</i>)
</h5>

<br>

<div class="table-responsive">

	<table class="table table-responsive table-bordered table-striped table-condensed">

		<thead></thead>

		<tbody>
			
			<tr>
				<td><strong>Nombre</strong></td>
				<td>{!! $presentacion->nombre !!}</td>	
			</tr>

			<tr>
				<td><strong>Descripción</strong></td>
				<td>{!! $presentacion->getDescripcion() !!}</td>				
			</tr>

		</tbody>

	</table>

</div>