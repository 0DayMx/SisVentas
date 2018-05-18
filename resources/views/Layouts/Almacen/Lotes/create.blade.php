<div class="form-group">

    <div class="col-lg-4"> 
        <span class="help-block-label">NOMBRE DEL LOTE</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
            {!! Form::text('nombre', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}
        </div>

        @if( $errors->has('nombre') )          
            @foreach($errors->get('nombre') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-3"> 
        <span class="help-block-label">ARTÍCULO</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
            {!! Form::select('id_articulo',$articulos,null,[
                'class'=>'form-control select2']) !!}
        </div>

        @if( $errors->has('id_articulo') )          
            @foreach($errors->get('id_articulo') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-3"> 
        <span class="help-block-label">PROVEEDOR</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
            {!! Form::select('id_proveedor',$proveedores,null,[
                'class'=>'form-control select2']) !!}
        </div>

        @if( $errors->has('id_proveedor') )          
            @foreach($errors->get('id_proveedor') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>
    
</div>


<div class="form-group">

     <div class="col-lg-3"> 
        <span class="help-block-label">PRECIO DE COMPRA</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
            {!! Form::text('precio_compra', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}
        </div>
        <span class="help-label">Escribir dos decimales .00</p>

        @if( $errors->has('precio_compra') )          
            @foreach($errors->get('precio_compra') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-3"> 
        <span class="help-block-label">TIPO DE MONEDA (Compra)</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-eur"></i></span>
           {!! Form::select('tipo_moneda',config('options.tipo_moneda'),null,[
                'class'=>'form-control input-sm']) !!}
        </div>

        @if( $errors->has('tipo_moneda') )          
            @foreach($errors->get('tipo_moneda') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-3"> 
        <span class="help-block-label">TIPO DE CAMBIO (día de la compra)</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
            {!! Form::text('tipo_cambio', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}
        </div>

        @if( $errors->has('tipo_cambio') )          
            @foreach($errors->get('tipo_cambio') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div> 


    <div class="col-lg-3"> 
        <span class="help-block-label">PRECIO DE VENTA</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
            {!! Form::text('precio_venta', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}
        </div>
        <span class="help-label">Escribir dos decimales .00</p>

        @if( $errors->has('precio_venta') )          
            @foreach($errors->get('precio_venta') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>  

</div>

