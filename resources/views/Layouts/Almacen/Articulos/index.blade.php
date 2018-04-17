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

	 <table id="index_articulos" class="table table-hover table-striped-index table-striped-index table-condensed">

		<thead class="table-head-index">            
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Presentación</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody class="table-body-index">

            @foreach($articulos as $dato)
                <tr>
                    <td>{!! $dato->articulo !!}</td>
                    <td>{!! $dato->categoria !!}</td>
                    <td>{!! $dato->presentacion !!}</td>
                    <td>
                        <a href="{!! url('articulos/'.$dato->id.'/edit') !!}" 
                            class="btn btn-xs btn-flat btn-warning"
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="Modificar el artículo {!! $dato->articulo !!}">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>

                        <a href="{!! url('articulos/'.$dato->id) !!}" 
                            class="btn btn-xs btn-flat btn-info"
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="Detalle del artículo {!! $dato->articulo !!}">
                            <i class="glyphicon glyphicon-info-sign"></i>
                        </a>

                        <a href="{!! url('articulos/'.$dato->id.'/destroy') !!}" 
                            class="btn btn-xs btn-flat btn-danger"
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="Eliminar el artículo {!! $dato->nombre !!}"
                            onclick="return confirm('¿Seguro de eliminar el artículo {!! $dato->articulo !!} ?')">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
          
        </tbody>

	</table>

</div>