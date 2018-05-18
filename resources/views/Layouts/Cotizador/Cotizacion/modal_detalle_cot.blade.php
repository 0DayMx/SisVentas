<div class="modal fade" id="modal-detalle-cot">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Detalle de cotización | {!! $cotizacion->no_cotizacion !!} </h4>
            </div>
        
            <div class="modal-body">
                
                <div class="table-responsive">
                      
                      <table class="table table-striped table-condensed">

                          <thead class="text-doce">
                          </thead>

                          <tbody class="text-doce">
                              
                              <tr>
                                  <td><span class="text-blue-uno"> Atención </span></td>
                                  <td> {!! $cotizacion->receptor !!} </td>
                              </tr>
                               <tr>
                                  <td><span class="text-blue-uno"> Cliente </span></td>
                                  <td> {!! $cliente->razon_social !!} </td>
                              </tr>
                              <tr>
                                  <td><span class="text-blue-uno"> Correo destino </span></td>
                                  <td> {!! $cotizacion->correo !!} </td>
                              </tr>
                              <tr>
                                  <td><span class="text-blue-uno"> Fecha de emision </span></td>
                                  <td> {!! $cotizacion->getFechaEmision() !!} </td>
                              </tr>
                              <tr>
                                  <td><span class="text-blue-uno"> Tiempo de entrega </span></td>
                                  <td> {!! $cotizacion->tiempo_entrega !!} </td>
                              </tr>
                              <tr>
                                  <td><span class="text-blue-uno"> Condiciones de pago </span></td>
                                  <td> {!! $cotizacion->getCondicionPago() !!} </td>
                              </tr>
                              <tr>
                                  <td><span class="text-blue-uno"> Vigencia </span></td>
                                  <td> {!! $cotizacion->getVigencia() !!} </td>
                              </tr>
                              <tr>
                                  <td><span class="text-blue-uno"> Días restates </span></td>
                                  <td>{!! $cotizacion->getStVencimiento() !!}</td>
                              </tr>
                              <tr>
                                  <td><span class="text-blue-uno">Impuesto IVA</span></td>
                                  <td>{!! $cotizacion->getIva() !!}</td>
                              </tr>
                              <tr>
                                  <td><span class="text-blue-uno">Descuento al total</span></td>
                                  <td>{!! $cotizacion->descuento !!} %</td>
                              </tr>
                              <tr>
                                  <td><span class="text-blue-uno">Creada</span></td>
                                  <td>{!! $cotizacion->created_at !!}</td>
                              </tr>
                              <tr>
                                  <td><span class="text-blue-uno">Modificada</span></td>
                                  <td>{!! $cotizacion->updated_at !!}</td>
                              </tr>
                              <tr>
                                  <td><span class="text-blue-uno">Estatus de la cotización</span></td>
                                  <td>{!! $cotizacion->getStatus() !!}</td>
                              </tr>

                          </tbody>
                      </table>

                    </div>
            </div>
        
            <div class="modal-footer">

                <a href="{!! url('cotizador/cotizacion/'.$cotizacion->id.'/export/1') !!}" 
                    class="btn btn-light btn-xs"
                    target="_blank">                   
                    Exportar a PDF <i class="fa fa-file-pdf-o"></i>
                </a>
                <a href="{!! url('cotizador/cotizacion/'.$cotizacion->id.'/export/2') !!}" 
                    class="btn btn-light btn-xs"
                    target="_blank">                   
                    Descargar en PDF <i class="fa fa-download"></i>
                </a>

                <a
                    class="btn btn-light btn-xs"
                    target="_blank" disabled>                   
                    Envier por email <i class="glyphicon glyphicon-print"></i>
                </a>

                <a href="{!! url('cotizacion/'.$cotizacion->id.'/edit') !!}" 
                    class="btn btn-warning btn-xs">                   
                    Modificar <i class="glyphicon glyphicon-edit"></i>
                </a>

                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"> OK </button>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->