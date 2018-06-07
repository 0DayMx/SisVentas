<?php

namespace sisventas\Modelos\Configuracion;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $table = 'logo';
    protected $primaryKey = 'id';
    protected $fillable = [

    		'nameOrg',
    		'nameSan',
    		'nameEnc',
    		'ext',
    		'size'
    		
    ];

}
