<?php

namespace sisventas\Modelos\Almacen;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'id';
    protected $fillable = [

    	'nombre',
    	'descripcion'

    ];


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
