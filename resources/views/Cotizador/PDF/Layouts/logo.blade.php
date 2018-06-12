@if( $logo != null )
	
	@if( file_exists( $url_logo ) )
        	
        <center>{!! Html::image( $url_logo,'',['class'=>'img-logo'] ) !!}</center>

    @else
            
        <center>
           	{!! Html::image( 'img/no-data/noFile.png','',['class'=>'img-thumbnail-noFile'] ) !!}
        </center>

    @endif

@else
	
	{!! Html::image( 'img/no-data/company.jpg','',['class'=>'img-logo'] ) !!}

@endif