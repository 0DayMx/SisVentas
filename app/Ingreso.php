<?php

namespace sisventas;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    //
    protected $table='inventario';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'fecha_hora',
        'cantidad',
        'id_lote',
        'tipo_comprobante',
        'numero_comprobante'
    ];
    protected $guarded =[
    ];
}
