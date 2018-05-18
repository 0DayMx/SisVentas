<p>

    <span class="help-label">
        Si solo ingresará 1 en cantidad, puede dejar el campo en blanco, y automáticamente
        se agregará uno del o los seleccionados.
    </span>
    <div class="col-md-3"> 
        <div class="input-group">                   
            <span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span>
                {!! Form::text('cantidad', null, [
                    'class' => 'form-control input-sm',
                    'autocomplete'=>'off',
                    'placeholder' => 'Cantidad'
                ]) !!}
        </div>
    </div>

        <input type="submit" value="Agregar artículos seleccionados" title="" name="BtnAgregar" 
        class="btn btn-success btn-xs">
</p> 

<br><br>

<div class="table-responsive">

	 <table id="index_agrega_articulos" class="table table-hover table-striped-index table-striped-index table-condensed">

		<thead class="table-head-index">            
           <tr>
                <th>Lote pertene</th>
                <th>Artículo</th>
                <th>Categoría</th>
                <th>Presentación</th>
                <th>Descripción</th>
                <th>$ venta</th>
                <th></th>
            </tr>
        </thead>

        <tbody class="table-body-index">

             @foreach( $agrega_articulos as $dato )

                <tr>
                    <td> {!! $dato->lote !!} </td>
                    <td> {!! $dato->articulo !!} </td>
                    <td> {!! $dato->categoria_articulo !!} </td>
                    <td> {!! $dato->presentacion_articulo !!} </td>
                    <td> {!! $dato->descripcion_articulo !!} </td>
                    <td> {!! $dato->precio_venta !!} </td>
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