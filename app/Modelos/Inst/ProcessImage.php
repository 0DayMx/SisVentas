<?php

namespace sisventas\Modelos\Inst;

use Illuminate\Database\Eloquent\Model;

use sisventas\Modelos\Inst\SaneaString;
use Intervention\Image\ImageManagerStatic as Image;

class ProcessImage extends Model
{
    //Almacena una imágen (nuevo registro) y la recorta según los parámetros.
    public static function store_img( $file_img, $directory_store_img, $max_width )
    {
    	$respuesta_img = [];

    	if( !empty( $file_img ) )
    	{
    		//Obtenemos los atributos del archivo(imagen)
        	$nameOrg = $file_img->getClientOriginalName();
        	$nameSan = SaneaString::sanear_string( $nameOrg );
        	$ext = $file_img->getClientOriginalExtension();
        	$nameEnc = str_random( 20 ). '.' . $ext;

        	//Creamos una instancia a Intervention/Image para poder recortarla si es necesario
        	$image = Image::make( $file_img );

        	if( $image->width() <= $max_width )
        	{
            	$image_save = $image->orientate()->save( $directory_store_img . $nameEnc );
                //el tamaño lo convertimos a mb.
                $size = ProcessImage::convert_weight( $image_save->filesize(), 'mb' );
        	}
        	else
        	{
            	$image_save = $image->orientate()->resize( $max_width, null, function( $constraint ){
                	$constraint->aspectRatio();
            	})->save( $directory_store_img . $nameEnc );

            	//el tamaño lo convertimos a mb.
            	$size = ProcessImage::convert_weight( $image_save->filesize(), 'mb' );
        	}

            if($image_save)
            {
        	   $respuesta_img['nameOrg'] = $nameOrg;
        	   $respuesta_img['nameSan'] = $nameSan;
        	   $respuesta_img['nameEnc'] = $nameEnc;
        	   $respuesta_img['ext']     = $ext;
        	   $respuesta_img['size']    = $size;
               $respuesta_img['save_image'] = true;
            }
            else
            {
                $respuesta_img['save_image'] = false;
            }
         
        }
        else
        {
        	$respuesta_img['nameOrg'] = '';
        	$respuesta_img['nameSan'] = '';
        	$respuesta_img['nameEnc'] = '';
        	$respuesta_img['ext']     = '';
        	$respuesta_img['size']    = '';
            $respuesta_img['save_image'] = true;
        } 

        return $respuesta_img;
    }



    //Funcion para convertir de bytes a KB, MB & GB
    private static function convert_weight( $weight_bytes, $param )
    {
        if($param == 'kb')
        {
            //retorna el valor de bytes a KB
            return number_format( doubleval ( $weight_bytes / 1024 ),3,'.','' );
        }
        elseif($param == 'mb')
        {
            //retorna el valor de bytes a MB
            return number_format( doubleval ( ( $weight_bytes / 1024 ) / 1024 ),3,'.','' );
        }
        elseif($param == 'gb')
        {
            //retorna el valor de bytes a GB
            return number_format( doubleval ( ( ( $weight_bytes / 1024 ) / 1024 ) / 1024 ),3,'.','' );
        }
    }

}
