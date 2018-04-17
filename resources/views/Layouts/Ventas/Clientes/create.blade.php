<div class="form-group">

    <div class="col-lg-4"> 
        <span class="help-block-label">RAZÓN SOCIAL</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
            {!! Form::text('razon_social', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}
        </div>

        @if( $errors->has('razon_social') )          
            @foreach($errors->get('razon_social') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-4">
        <span class="help-block-label">RÉGIMEN FISCAL</span>     
        {!! Form::select('regimen_fiscal', config('options.regimenFiscal'), null, [
                'class'=>'form-control input-sm select2']) !!}

        @if( $errors->has('regimen_fiscal') )          
            @foreach($errors->get('regimen_fiscal') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-4">
        <span class="help-block-label">TIPO DE DOCUMENTO</span>     
        {!! Form::select('tipo_documento', config('options.tipo_documento'), null, [
                'id'=>'tipo_documento',
                'class'=>'form-control input-sm ', 
                'title' => 'selecciona un Régimen']) !!}

        @if( $errors->has('tipo_documento') )          
            @foreach($errors->get('tipo_documento') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

</div>

<div class="form-group">

    <div class="col-lg-3"> 
        <span class="help-block-label">NÚMERO DE DOCUMENTO</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
              {!! Form::text('numero_documento', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}
        </div>

        @if( $errors->has('numero_documento') )          
            @foreach($errors->get('numero_documento') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-6"> 
        <span class="help-block-label">DIRECCIÓN</span>       
        {!! Form::text('direccion', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}

        @if( $errors->has('direccion') )          
            @foreach($errors->get('direccion') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-3"> 
        <span class="help-block-label">TELÉFONO</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
              {!! Form::text('telefono', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}
        </div>

        @if( $errors->has('telefono') )          
            @foreach($errors->get('telefono') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

</div>

<div class="form-group">

    <div class="col-lg-5"> 
        <span class="help-block-label">CORREO ELECTRÓNICO</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              {!! Form::text('correo', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}
        </div>

        @if( $errors->has('correo') )          
            @foreach($errors->get('correo') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

</div>

<script type="text/javascript">
  
   

</script>