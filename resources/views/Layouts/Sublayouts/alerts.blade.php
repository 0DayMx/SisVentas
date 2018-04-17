<!-- Éxito en la operación -->
@if (Session::get('success') )
  <div id="success" class="alert alert-success alert-dismissable" 
    style="border-left: 3px solid #12430F; border-right: 0px;border-top: 0px;border-bottom: 0px;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4><i class="glyphicon glyphicon-ok-sign"></i> ¡Bien hecho! </h4> {!! Session::get('success') !!}
  </div>
@endif

<!-- Mensaje 'CUIDADO' -->
@if (Session::get('warning') )
  <div id="warning" class="alert alert-warning alert-dismissable" 
    style="border-left: 3px solid #84684C; border-right: 0px;border-top: 0px;border-bottom: 0px;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4><i class="glyphicon glyphicon-exclamation-sign"></i> ¡Cuidado! </h4> {!! Session::get('warning') !!}
  </div>
@endif

<!-- Mensaje de información -->
@if (Session::get('info') )
  <div id="info" class="alert alert-info alert-dismissable" 
    style="border-left: 3px solid #19696E; border-right: 0px;border-top: 0px;border-bottom: 0px;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4><i class="glyphicon glyphicon-info-sign"></i> ¡Información! </h4> {!! Session::get('info') !!}
  </div>
@endif

<!-- Mensaje de Error -->
@if (Session::get('error') )
  <div id="error" class="alert alert-danger alert-dismissable" 
    style="border-left: 3px solid #822D2D; border-right: 0px;border-top: 0px;border-bottom: 0px;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4><i class="glyphicon glyphicon-remove-sign"></i> ¡Error! </h4> {!! Session::get('error') !!}
  </div>
@endif