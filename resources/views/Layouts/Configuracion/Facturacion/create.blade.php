<p class="text-primary">
    <strong>Nota.</strong>
    Algunos datos de aquí son tomados para el formato de cotizaciones. (Sugerencia de llenar todo el formulario)
</p>

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

    <div class="col-lg-3"> 
        <span class="help-block-label">RFC</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
            {!! Form::text('rfc', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}
        </div>

        @if( $errors->has('rfc') )          
            @foreach($errors->get('rfc') as $error )   
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

</div>

<div class="form-group">

    <div class="col-lg-2"> 
        <span class="help-block-label">CÓDIGO POSTAL</span>    
        {!! Form::text('codigo_postal', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}

        @if( $errors->has('codigo_postal') )          
            @foreach($errors->get('codigo_postal') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-3"> 
        <span class="help-block-label">CALLE Y NÚMERO</span>   
        {!! Form::text('calle', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}

        @if( $errors->has('calle') )          
            @foreach($errors->get('calle') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-3"> 
        <span class="help-block-label">COLONIA</span>   
        {!! Form::text('colonia', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}

        @if( $errors->has('colonia') )          
            @foreach($errors->get('colonia') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-3"> 
        <span class="help-block-label">MUNICIPIO O DEMARCACIÓN TERRITORIAL</span>   
        {!! Form::text('municipio', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}

        @if( $errors->has('municipio') )          
            @foreach($errors->get('municipio') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

</div>


<div class="form-group">

    <div class="col-lg-3"> 
        <span class="help-block-label">ENTIDAD FEDERATIVA</span>   
        {!! Form::text('entidad', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}

        @if( $errors->has('entidad') )          
            @foreach($errors->get('entidad') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

    <div class="col-lg-4"> 
        <span class="help-block-label">TELÉFONO(S)</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            {!! Form::text('telefono', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}
        </div>

    </div>

    <div class="col-lg-4"> 
        <span class="help-block-label">EMAIL DE CONTACTO</span>       
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

