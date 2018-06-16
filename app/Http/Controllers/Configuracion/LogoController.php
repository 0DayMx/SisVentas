<?php

namespace sisventas\Http\Controllers\Configuracion;

use Illuminate\Http\Request;

use sisventas\Http\Requests;
use sisventas\Http\Controllers\Controller;

use sisventas\Http\Requests\Configuracion\Logo\StoreRequest as StoreLogo;

use sisventas\Modelos\Configuracion\Logo;

//Libs
use sisventas\Modelos\Inst\ProcessImage;

class LogoController extends Controller
{
   
    public function index()
    {
        //
    }

   
    public function create()
    {
        $model = new Logo;
        $get_all_data = $model->all();

        if( $get_all_data->count() )
        {
            $logo = $model->first();
            $url_logo = '0000server/logo/'.$logo->nameEnc;
        }
        else
        {
            $logo = null;
            $url_logo = null;
        }

        $array = [

            'logo' => $logo,
            'url_logo' => $url_logo

        ];

        $view = 'Configuracion.Logo.create';
        return view( $view )->with( $array );
    }

   
    public function store( StoreLogo $request )
    {
        //Vamos a procesar el logotipo   
        //Definimos el $max_width para saber el ancho máximo permitido, 650 si no la queremos grande.
        //Definimos el directorio de almacenamiento.
        $directory_store_img = public_path().'/0000server/logo/';        
            
        $respuesta_img = ProcessImage::store_img(
            $request->file( 'file' ), 
            $directory_store_img, 
            $max_width = '650'
        );

        if( $respuesta_img[ 'save_image' ] == true )
        {
            $logo = new Logo;
            $logo->nameOrg = $respuesta_img[ 'nameOrg' ];
            $logo->nameSan = $respuesta_img[ 'nameSan' ];
            $logo->nameEnc = $respuesta_img[ 'nameEnc' ];
            $logo->ext = $respuesta_img[ 'ext' ];
            $logo->size = $respuesta_img[ 'size' ];
            $logo->save();
                
            if( $logo->save() )
            {
                alert()->success(
                    'El logotipo del negocio se registró correctamente.', 
                    'Correcto'
                )->html()->autoclose( 3000 );

                return redirect()->back();
            }
            else
            {
                alert()->error(
                    'El logotipo del negocio no se pudo registrar.',
                    'Intenta nuevamente'
                )->persistent( 'Cerrar' );

                return redirect()->back();
            }
        }
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy( $id )
    {
        $logo = Logo::findOrFail( $id );

        $url = '0000server/logo/'.$logo->nameEnc;
        $destroy_url = unlink( $url );

        if( $destroy_url )
        {
            $destroy_logo = $logo->delete();

            if( $destroy_logo )
            {
                alert()->success(
                    'El logotipo del negocio se eliminó correctamente.', 
                    'Correcto'
                )->html()->autoclose( 3000 );

                return redirect()->back();
            }
            else
            {
                alert()->error(
                    'El logotipo del negocio no se pudo eliminar.',
                    'Intenta nuevamente'
                )->persistent( 'Cerrar' );

                return redirect()->back();
            }

        }
        else
        {
            alert()->error(
                'El logotipo del negocio no se pudo eliminar del servidor, ni de la BD.',
                'Intenta nuevamente'
            )->persistent( 'Cerrar' );

            return redirect()->back();
        }
    }


    public function download( $id )
    {
        $logo = Logo::findOrFail( $id );

        $url_download = '0000server/logo/'.$logo->nameEnc;

        if( file_exists( $url_download ) )
        {
            return response()->download( $url_download, 'logotipo.'.$logo->ext );
        }
        else
        {
            session()->flash(
                'error',
                'El logotipo no se puede descargar porque no existe en el servidor'
            );
            return redirect()->back();
        }
    }
}
