<h5>
	<span class="label label-info">Creado:</span> {!! $articulo->created_at !!} | 
	<span class="label label-info">Modificado:</span> 
	{!! $articulo->updated_at !!} (<strong><i>{!! $articulo->updated_at->diffForHumans() !!}</strong> aprox.</i>)
</h5>

<br>

<div class="table-responsive">

	<table width="100%" class="table table-responsive table-bordered table-striped table-condensed">

		<thead></thead>

		<tbody>

			<tr>
				<td width="30%"><strong>Nombre</strong></td>
				<td width="70%">{!! $articulo->nombre !!}</td>				
			</tr>

			<tr>
				<td><strong>Categoría</strong></td>
				<td>{!! $categoria->nombre !!}</td>				
			</tr>
			<tr>
				<td><strong>Presentación</strong></td>
				<td>{!! $presentacion->nombre !!}</td>				
			</tr>			
			<tr>
				<td><strong>Descripción</strong></td>
				<td>{!! $articulo->getDescripcion() !!}</td>				
			</tr>

		</tbody>

	</table>

</div>