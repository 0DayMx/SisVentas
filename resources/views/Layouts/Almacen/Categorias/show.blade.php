<h5>
	<span class="label label-info">Creado:</span> {!! $cat->created_at !!} | 
	<span class="label label-info">Modificado:</span> 
	{!! $cat->updated_at !!} (<strong><i>{!! $cat->updated_at->diffForHumans() !!}</strong> aprox.</i>)
</h5>

<br>

<div class="table-responsive">

	<table width="100%" class="table table-responsive table-bordered table-striped table-condensed">

		<thead></thead>

		<tbody>
			
			<tr>

				<td><strong>Nombre</strong></td>
				<td>{!! $cat->nombre !!}</td>

			</tr>
			<tr>

				<td><strong>Descripción</strong></td>
				<td>{!! $cat->getDescripcion() !!}</td>
				
			</tr>

		</tbody>

	</table>

</div>