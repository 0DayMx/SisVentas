<div class="btn-group">
    <button type="button" class="btn btn-xs btn-success">Reportes <i class="glyphicon glyphicon-print"></i></button>
    <button type="button" class="btn btn-xs btn-success dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">Exportar todos los registros a PDF</a></li>
        <li><a href="#">Exportar y Descargar todos los registros en PDF</a></li>
    </ul>
</div>

<br><br>

<div class="table-responsive">

	 <table id="index_proveedores" class="table table-hover table-striped-index table-striped-index table-condensed">

		<thead class="table-head-index">            
           <tr>
                <th>N° Cotización</th>
                <th>Atención</th>
                <th>Cliente</th>
                <th>Emisión</th>
                <th>Vigencia</th>
                <th>Vence</th>
                <th>Estado</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody class="table-body-index">

             @foreach( $cotizaciones as $dato )

                <tr>
                    <td> {!! $dato->cotizacion !!} </td>
                    <td> {!! $dato->receptor !!} </td>
                    <td> {!! $dato->cliente !!} </td>
                    <td> {!! $dato->fecha_emision !!} </td>
                    <td> {!! $dato->getVigencia() !!} </td>
                    <td> {!! $dato->getFechaVencimiento() !!} </td>
                    <td> {!! $dato->getStVencimiento() !!} </td>
                    
                    <td>
                        <a href="{!! url( 'cotizacion/'.$dato->id.'/edit' ) !!}"
                            class="btn btn-xs btn-flag btn-warning" 
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="Modificar cotizacion #  {!! $dato->cotizacion !!}">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{!! url( 'cotizacion/'.$dato->id.'/agrega_articulo' ) !!}"
                            class="btn btn-xs btn-flag btn-primary"
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="Agregar o quitar productos a cotización # {!! $dato->cotizacion !!}">
                            <i class="glyphicon glyphicon-shopping-cart"></i>
                        </a>
                    </td>

                    <td>
                        <button class='btn btn-xs btn-flag btn-danger' 
                            value="{!! $dato->id !!}" 
                            data-toggle="tooltip" data-placement="top" title="Eliminar cotización # {!! $dato->cotizacion !!}"
                            onclick="
                                destroyCotizacion(
                                    'Cotización N° {!! $dato->cotizacion !!}',
                                    '{!! url( 'cotizacion/'.$dato->id.'/destroy' ) !!}'
                                );">
                            <i class="glyphicon glyphicon-trash"></i>
                        </button>
                    </td>
                    <td>
                        <label>                                         
                            <input type="checkbox" name="cotizaciones[]" value="{!! $dato->id !!}">
                        </label>
                    </td>

                </tr>

            @endforeach
          
        </tbody>

	</table>

</div>