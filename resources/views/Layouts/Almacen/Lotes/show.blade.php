<h5>
	<span class="label label-info">Creado:</span> {!! $lote->created_at !!} | 
	<span class="label label-info">Modificado:</span> 
	{!! $lote->updated_at !!} (<strong><i>{!! $lote->updated_at->diffForHumans() !!}</strong> aprox.</i>)
</h5>

<br>

<div class="table-responsive">

	<table width="100%" class="table table-responsive table-bordered table-striped table-condensed">

		<thead></thead>

		<tbody>

			<tr>
				<td width="30%"><strong>Nombre</strong></td>
				<td width="70%">{!! $lote->nombre !!}</td>				
			</tr>

			<tr>
				<td><strong>Artículo</strong></td>
				<td>
					<a href="{!! url('articulos/'.$articulo->id) !!}"
                    	data-toggle="tooltip" 
                    	data-placement="left" 
                    	title="Ir al detalle del artículo">
                    	{!! $articulo->nombre !!}
                    </a>
                </td>				
			</tr>
			<tr>
				<td><strong>Precio de compra</strong></td>
				<td><strong>$</strong> {!! $lote->precio_compra !!} </td>				
			</tr>			
			<tr>
				<td><strong>Tipo de moneda (Compra)</strong></td>
				<td>{!! $lote->getTipoMoneda() !!}</td>				
			</tr>
			<tr>
				<td><strong>Tipo de cambio (Día de compra)</strong></td>
				<td>{!! $lote->tipo_cambio !!}</td>				
			</tr>
			<tr>
				<td><strong>Precio de compra (Real)</strong></td>
				<td><strong>$</strong> {!! $lote->getPurchasePrice() !!}</td>				
			</tr>
			<tr>
				<td><strong>Precio de venta</strong></td>
				<td><strong>$</strong> {!! $lote->precio_venta !!}</td>				
			</tr>
			<tr>
				<td><strong>Proveedor</strong></td>
				<td>	
					<a href="{!! url('proveedores/'.$proveedor->id) !!}"
                    	data-toggle="tooltip" 
                    	data-placement="left" 
                    	title="Ir al detalle del proveedor">
						{!! $proveedor->razon_social !!}
					</a>
				</td>				
			</tr>

		</tbody>

	</table>

</div>