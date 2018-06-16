<div class="form-group">

    <div class="col-lg-3"> 
        <span class="help-block-label">NÚMERO DE COTIZACIÓN</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
            {!! Form::text('no_cotizacion', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}
        </div>

        @if( $errors->has('no_cotizacion') )          
            @foreach($errors->get('no_cotizacion') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-4"> 
        <span class="help-block-label">ATENCIÓN</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            {!! Form::text('receptor', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}
        </div>

        @if( $errors->has('receptor') )          
            @foreach($errors->get('receptor') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-3"> 
        <span class="help-block-label">EMAIL DE ENVÍO (opcional)</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            {!! Form::text('correo', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}
        </div>

        @if( $errors->has('correo') )          
            @foreach($errors->get('correo') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

   

</div>

<div class="form-group">
  
    <div class="col-lg-3">
        <span class="help-block-label">CLIENTE</span>     
        {!! Form::select('id_cliente', $clientes, null, [
                'class'=>'form-control select2 ', 
                'title' => 'selecciona un cliente']) !!}

        @if( $errors->has('id_cliente') )          
            @foreach($errors->get('id_cliente') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-3"> 
        <span class="help-block-label">FECHA DE EMISIÓN</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            {!! Form::text(
                        'fecha_emision',
                        null, 
                        array(
                            'class' => 
                            'form-control input-sm', 
                            'id'=>'fecha_emision',
                            'autocomplete' => 'off',
                            'placeholder' => 'Ex: 2016-07-28 23:59'
                        )
                ) !!}
        </div>

        @if( $errors->has('fecha_emision') )          
            @foreach($errors->get('fecha_emision') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-3"> 
        <span class="help-block-label">TIEMPO DE ENTREGA</span> 
        {!! Form::text('tiempo_entrega', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}

        @if( $errors->has('tiempo_entrega') )          
            @foreach($errors->get('tiempo_entrega') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-2"> 
        <span class="help-block-label">AGREGAR DESCUENTO</span>       
        <div class="input-group"> 
            {!! Form::text('descuento', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}
            <span class="input-group-addon">%</span>
        </div>

        @if( $errors->has('descuento') )          
            @foreach($errors->get('descuento') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

</div>

<div class="form-group">

    <div class="col-lg-3">
        <span class="help-block-label">CONDICIONES DE PAGO</span>     
        {!! Form::select('condicion_pago', config('options.condicion_pago'), null, [
                'class'=>'form-control input-sm ', 
                'title' => 'selecciona un Régimen']) !!}

        @if( $errors->has('condicion_pago') )          
            @foreach($errors->get('condicion_pago') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-3">
        <span class="help-block-label">VALIDEZ DE LA OFERTA</span>     
        {!! Form::select('vigencia', config('options.vigencia'), null, [
                'class'=>'form-control input-sm ', 
                'title' => 'selecciona un Régimen']) !!}

        @if( $errors->has('vigencia') )          
            @foreach($errors->get('vigencia') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-3">
        <span class="help-block-label">IMPUESTO IVA</span>     
        {!! Form::select('iva', config('options.iva'), null, [
                'class'=>'form-control input-sm ', 
                'title' => 'selecciona un Régimen']) !!}

        @if( $errors->has('iva') )          
            @foreach($errors->get('iva') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>


    <!--
    <div class="col-lg-3">
        <span class="help-block-label">TIPO DE MONEDA</span>     
        {!! Form::select('tipo_moneda', config('options.tipo_moneda'), null, [
                'class'=>'form-control input-sm ', 
                'title' => 'selecciona un Régimen']) !!}

        @if( $errors->has('tipo_moneda') )          
            @foreach($errors->get('tipo_moneda') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>
    -->

</div>

<div class="form-group">

<div class="col-lg-12">
    <span class="help-block-label">NOTA</span>       
    {!! Form::textarea('nota',null, array('class' => 'form-control input-sm', 'autocomplete' => 'off', 'rows'=>'7')) !!} 

        @if( $errors->has('nota') )
            @foreach($errors->get('nota') as $error )
                <font size="2" color="#C76A5B">{{ $error }}</font>
            @endforeach
        @endif 
</div>

</div>


