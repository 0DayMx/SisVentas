<div class="box">

   	<div class="box-header with-border">
   		<h3 class="box-title">
   			<font color="#C7C7C7">{!! strtoupper( $logo->ext ) !!} |</font> 
   			<font color="#C7C7C7">{!! $logo->size !!} MB</font>
   		</h3>
   	</div>

   	<div class="box-body">
    
    	<div class="row">

			<div class="col-md-4"></div>

			<div class="col-md-4">
		

				@if( file_exists( $url_logo ) )
        	
        		<center>{!! Html::image( $url_logo,'',['class'=>'img-thumbnail'] ) !!}</center>

        @else
            
            <center>
            	 {!! Html::image( 'images/no_data/noFile.png','',['class'=>'img-thumbnail'] ) !!}
            </center>

        @endif

        <br>

        <button class='btn btn-danger btn-xs' 
    				value="{!! $logo->id !!}" 
    				data-toggle="tooltip" data-placement="top" title="Eliminar"
    				onclick="
    					destroyLogo(
        					'Eliminar',
        					'{!! url('config/logo/'.$logo->id.'/destroy') !!}'
    					);">
    				Eliminar <i class="glyphicon glyphicon-trash"></i>
				</button>

				<a href="{!! url('config/logo/'.$logo->id.'/download') !!}"
					data-toggle="tooltip" data-placement="top" title="Descargar"
					target="_blank" 
					class="btn btn-xs btn-info">
					Descargar <i class="glyphicon glyphicon-cloud-download"></i>
				</a>


			</div>

			<div class="col-md-4"></div>

		</div> 

	</div>

</div>