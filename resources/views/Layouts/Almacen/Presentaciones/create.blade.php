<div class="form-group">

    <div class="col-lg-4"> 
        <span class="help-block-label">NOMBRE</span>       
        <div class="input-group"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
            {!! Form::text('nombre', null, ['class' => 'form-control input-sm','autocomplete'=>'off']) !!}
        </div>

        @if( $errors->has('nombre') )          
            @foreach($errors->get('nombre') as $error )   
                <font color="#BF4949" size="2">{{ $error }}</font></br>
            @endforeach
        @endif
    </div>

</div>

<div class="form-group">

    <div class="col-lg-12">
    	<span class="help-block-label">DESCRIPCIÓN</span>
    	{!! Form::textarea('descripcion', null, ['rows'=>'6','class' => 'form-control input-sm', ]) !!}
    </div>

</div>

