@if( $articulos_agregados->count() )

    <table width="100%" class="tabla-articulos">

        <thead>

            <tr>
                <td colspan="7" class="renglon-verde-eim"></td>
            </tr>
            <tr>
                <th width="11%"><center> N° ARTÍCULO </center></th>
                <th width="9%"><center> CANTIDAD </center></th>
                <th width="50%"><center> DESCRIPCION </center></th>
                <!--<th width="10%"><center>UNIDAD</center>-->
                <th width="10%" colspan="2"><center> P. UNITARIO </center></th>
                <th width="10%" colspan="2"><center> IMPORTE </center></th>
            </tr>

        </thead>

        <tbody>

            @foreach( $articulos_agregados as $indexKey => $dato )

                <tr>
                    <td><center> {!! $indexKey+1 !!} </center></td>
                    <td><strong> <center> {!! $dato->cantidad !!} </center> </strong></td>
                    <td> {!! $dato->articulo !!} </td>
                    <!--<td> <center> {!! $dato->unidad !!} </center> </td>-->
                    <td style="border-right: none;"> $ </td>
                    <td style="border-left: none;">
                        <div align="right"> {!! number_format( $dato->precio_venta,2,'.',',' ) !!} </div> 
                    </td>
                    <td style="border-right: none;"> $ </td>
                    <td style="border-left: none;"> 
                        <div align="right"> {!! $dato->getImporteSinIVA() !!} </div> 
                    </td>
                </tr>

            @endforeach

            <tr>
                <td colspan="3" style="border: none;"></td>
                <td colspan="2"> <strong>SUBTOTAL</strong> </td>
                <td style="border-right: none;"> $ </td>
                <td style="border-left: none;"> <div align="right"> <strong>{!! $subtotal !!}</strong> </div> </td>
            </tr>
            <tr>
                <td colspan="3" style="border: none;"></td>
                <td colspan="2"> <strong>I.V.A 16%</strong> </td>
                <td style="border-right: none;"> $ </td>
                <td style="border-left: none;"> <div align="right"> <strong>{!! $iva !!}</strong> </div> </td>
            </tr>

            @if( $cotizacion->descuento != 0 )
                <tr>    
                    <td colspan="2" style="border: none;"></td>
                    <td style="border: none;"> <div align="right"> <strong>Descuento</strong> </div> </td>
                    <td colspan="2"> <strong>{!! $cotizacion->descuento !!}%</strong> </td>
                    <td style="border-right: none;"> $ </td>
                    <td style="border-left: none;"> <div align="right"> <strong>{!! $a_descontar !!}</strong> </div> </td>
                </tr>
            @endif

            <tr>
                <td colspan="3" style="border: none;"></td>
                <td colspan="2"> <strong>TOTAL</strong> </td>
                <td style="border-right: none;"> $</td>
                <td style="border-left: none;"> <div align="right"> <strong>{!! $total !!}</strong> </div> </td>
            </tr>

        </tbody>

    </table>

@else

    <hr>
    <p class="parrafo">
        <font color="#4CC0CD">
            TODAVÍA NO SE HA AGREGADO NINGÚN ARTÍCULO A ESTA COTIZACIÓN
        </font>
    </p>

@endif