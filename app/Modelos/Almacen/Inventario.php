<?php

namespace sisventas\Modelos\Almacen;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    protected $primaryKey = 'id';
    protected $fillable = [

    	'fecha',
    	'cantidad',
    	'id_lote'

    ];
}
