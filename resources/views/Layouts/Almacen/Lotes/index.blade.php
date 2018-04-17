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

	 <table id="index_lotes" class="table table-hover table-striped-index table-striped-index table-condensed">

		<thead class="table-head-index">            
            <tr>
                <th>Nombre del lote</th>
                <th>Artículo</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Tipo moneda</th>
                <th>Tipo de cambio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody class="table-body-index">

            @foreach($lotes as $dato)
                <tr>
                    <td>{!! $dato->lote !!}</td>
                    <td>{!! $dato->articulo !!}</td>
                    <td><strong>$</strong> {!! $dato->compra !!}</td>
                    <td><strong>$</strong> {!! $dato->venta !!}</td>
                    <td>{!! $dato->getTipoMoneda() !!}</td>
                    <td>{!! $dato->tipo_cambio !!}</td>
                    <td>
                        <a href="{!! url('lotes/'.$dato->id.'/edit') !!}" 
                            class="btn btn-xs btn-flat btn-warning"
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="Modificar el lote {!! $dato->lote !!}">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>

                        <a href="{!! url('lotes/'.$dato->id) !!}" 
                            class="btn btn-xs btn-flat btn-info"
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="Detalle del lote {!! $dato->lote !!}">
                            <i class="glyphicon glyphicon-info-sign"></i>
                        </a>

                        <a href="{!! url('lotes/'.$dato->id.'/destroy') !!}" 
                            class="btn btn-xs btn-flat btn-danger"
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="Eliminar el lote {!! $dato->lote !!}"
                            onclick="return confirm('¿Seguro de eliminar el lote {!! $dato->lote !!} ?')">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
          
        </tbody>

	</table>

</div>