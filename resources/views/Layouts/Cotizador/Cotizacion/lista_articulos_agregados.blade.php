{!! Form::open([
	'url' => 'cotizacion/'.$cotizacion->id.'/destroy_articulo',
	'method' => 'POST']) 
!!}

<p align="right">

	<input type="submit" value="Quitar artículos seleccionados" title="" name="BtnEliminar" 
	class="btn btn-danger btn-xs" 
	onclick="return confirm('¿Desea quitar los artículos seleccionados?')">

</p>

<div class="table responsive">

	<table class="table table-condensed">
		
		<thead class="text-diez">
			<tr>
				<th><center> N° de art. </center></th>
				<th><center> Cantidad </center></th>
				<th><center> Lote pertenece </center></th>
				<th><center> Descripción </center></th>
				<th><center> $ unit. </center></th>
				<th><center> Importe sin IVA </center></th>
				<th></th>
			</tr>
		</thead>

		<tbody class="text-once">
			
			@foreach( $articulos_agregados as $indexKey => $dato )

				<tr>
					<td><center> {!! $indexKey+1 !!} </center></td>
					<td><center> {!! $dato->cantidad !!} </center></td>
					<td><center> {!! $dato->lote !!} </center></td>
					<td> {!! $dato->articulo !!}, {!! $dato->descripcion_articulo !!} </td>
					<td><center>$ &nbsp; {!! number_format( $dato->precio_venta,2,'.',',' ) !!} </center></td>
					<td><center>$ &nbsp; {!! $dato->getImporteSinIVA() !!} </center></td>
					<td>
          			    <label>                    						
            			    <input type="checkbox" name="articulos[]" value="{!! $dato->id !!}">
            			</label>
					</td>
				</tr>

			@endforeach

		</tbody>

	</table>

</div>

{!! Form::close() !!}



<div class="row">
	
	<div class="col-md-2"> </div>

	<div class="col-md-2"> 
		<center>
			<strong>Subtotal</strong> <br> $ &nbsp;&nbsp;{!! $subtotal !!} 
		</center>
	</div>

	<div class="col-md-2"> 
		<center>
			<strong>I.V.A.</strong> <br> $ &nbsp;&nbsp;{!! $iva !!} 
		</center>
	</div>

	<div class="col-md-2"> 
		<center>
			<strong>Total sin descuento</strong> <br> $ &nbsp;&nbsp;{!! $total_sin_descuento !!}
		</center> 
	</div>

	<div class="col-md-2"> 
		<center>
			<strong>Descuento</strong> <br> 
				{!! $cotizacion->descuento !!} % &nbsp; = &nbsp;
				$ &nbsp;&nbsp;{!! $a_descontar !!}
		</center>
	</div>

	<div class="col-md-2"> 
		<center>
			<strong>Total</strong> <br> $ &nbsp;&nbsp;{!! $total !!}
		</center> 
	</div>

</div>