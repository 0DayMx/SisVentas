<?php

namespace sisventas\Modelos\Almacen;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulo';
    protected $primaryKey = 'id';
    protected $fillable = [

    	'nombre',
    	'descripcion',
    	'id_categoria',
    	'id_presentacion'

    ];

	//Obtenemos la descripción del articulo
    public function getDescripcion()
    {
    	$desc = $this->attributes['descripcion'];

    	if($desc == null)
    	{
    		return 'Sin descripción';
    	}
    	else
    	{
    		return $desc;
    	}
    }


}
