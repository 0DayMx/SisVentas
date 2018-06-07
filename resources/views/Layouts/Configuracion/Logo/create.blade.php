
<div class="col-lg-7">
    <span class="help-block-label">LOGOTIPO</span>

        <input id="img_logo" name="file" type="file" class="file" data-preview-file-type="any" multiple>
        <span class="help-block">Extensiones soportadas: [ .jpg, .png, .gif ].</span>

        @if( $errors->has('file') )
            @foreach($errors->get('file') as $error )
                <font size="2" color="#C76A5B">{{ $error }}</font>
            @endforeach
        @endif 
</div>   


