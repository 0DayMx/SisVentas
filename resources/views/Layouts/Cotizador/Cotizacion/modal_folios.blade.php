<div class="modal fade" id="modal-last-records">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Últimos folios registrados... </h4>
            </div>
        
            <div class="modal-body">
                
                @if( $cotizaciones->count() )

                    <div class="table-responsive">
                      
                      <table class="table table-striped-index table-striped-index table-condensed">

                          <thead class="text-doce">
                              <tr>
                                  <th>N°</th>
                                  <th>Receptor</th>
                                  <th>Cliente</th>
                                  <th>Creada</th>
                              </tr>
                          </thead>

                          <tbody class="text-doce">
                              
                              @foreach( $cotizaciones as $dato ) 
                                  <tr>
                                      <td>{!! $dato->cotizacion !!}</td>
                                      <td>{!! $dato->receptor !!}</td>
                                      <td>{!! $dato->cliente !!}</td>
                                      <td>{!! $dato->getFechaRegistro() !!}</td>
                                  </tr>
                              @endforeach

                          </tbody>
                      </table>

                    </div>

                @else
                    <p class="text-info"> Aún no hay registros de cotizaciones </p>
                @endif

            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal"> OK </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->