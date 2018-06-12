<div class="box box-widget widget-user-2">

    <div class="widget-user-header bg-aqua-active"> 

        <div class="widget-user-image">
            <!--<img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">-->
            {!! Html::image( 'img/sis/factura_electronica.png',null,['class' => 'img-circle'] ) !!}
        </div>

        <h3 class="widget-user-username">{!! $facturacion->razon_social !!}</h3>
        <h5 class="widget-user-desc">{!! $facturacion->rfc !!}</h5>
    </div>

    
            
    <div class="box-footer no-padding">
        <ul class="nav nav-stacked">
          <li>
              <a href="#">
                  {!! $facturacion->razon_social !!} 
                  <font color="#C7C7C7">( Razón social )</font>
              </a>
          </li>
          <li>
              <a href="#">
                  {!! $facturacion->rfc !!}
                  <font color="#C7C7C7">( RFC )</font>
              </a>
          </li>
           <li>
              <a href="#">
                  {!! $facturacion->regimen_fiscal !!}
                  <font color="#C7C7C7">( Régimen Fiscal )</font>
              </a>
          </li>
          <li>
              <a href="#">
                  {!! $facturacion->getDireccion() !!}
                  <font color="#C7C7C7">( Dirección fiscal )</font>
              </a>
          </li>
          <li>
              <a href="#">
                  {!! $facturacion->telefono !!}
                  <font color="#C7C7C7">( Teléfono(s) )</font>
              </a>
          </li>
          <li>
              <a href="#">
                  {!! $facturacion->correo !!}
                  <font color="#C7C7C7">( Email(s) )</font>
              </a>
          </li>
        </ul>

    </div>

</div>

<a href="{!! url( 'config/facturacion/'.$facturacion->id.'/edit' ) !!}" class="btn btn-xs btn-warning"
    data-toggle="tooltip" data-placement="top" title="Modificar">
    Modificar <i class="glyphicon glyphicon-edit"></i>
</a>


<button class='btn btn-danger btn-xs' 
    value="{!! $facturacion->id !!}" 
    data-toggle="tooltip" data-placement="top" title="Eliminar"
    onclick="
    destroyDataFact(
        'Eliminar',
        '{!! url('config/facturacion/'.$facturacion->id.'/destroy') !!}'
    );">
    Eliminar <i class="glyphicon glyphicon-trash"></i>
</button>


