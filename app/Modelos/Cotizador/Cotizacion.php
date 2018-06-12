<?php

namespace sisventas\Modelos\Cotizador;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Cotizacion extends Model
{
    protected $table = 'cot_cotizacion';
    protected $primaryKey = 'id';
    protected $fillable = [

    		'receptor',
    		'no_cotizacion',
            'id_cliente',
    		'correo',
            'fecha_emision',
            'tiempo_entrega',
            'condicion_pago',
            'vigencia',
            'iva',
            'descuento',    		
            //'tipo_moneda',
            'id_userEmisor',
            'nota',            
            'aceptada',
            'fecha_aceptada',
            'rechazada',
            'fecha_rechazada'
    ];

    public function getEmail()
    {
        $var = $this->attributes[ 'correo' ];
        
        if( empty( $var ) )
        {
            return 'No registrado';
        }
        else
        {
            return $var;
        }
    }

    //Obtenemos la condición de pago
    public function getCondicionPago()
    {
        switch( $this->attributes[ 'condicion_pago' ] ) {
            case 1:
                return 'Contado';
            break;

            case 2:
                return 'Crédito';
            break;
        }
    }

    //Obtenemos el tiempo de entrega
    public function getVigencia()
    {
        switch( $this->attributes[ 'vigencia' ] ) {            
            case 5:
                return '5 días';
            break;

            case 10:
                return '10 días';
            break;

            case 15:
                return '15 días';
            break;

            case 30:
                return '30 días';
            break;

            case 60:
                return '60 días';
            break;
        }
    }

    // Obtenemos el IVA
    public function getIva()
    {
        switch( $this->attributes[ 'iva' ] ) {
            case 1:
                return 'No aplicado';
            break;

            case 2:
                return 'Aplicado';
            break;
        }
    }

    // Obtenemos el status de la cotizacion
    public function getStatus()
    {
        $__aceptada = $this->attributes[ 'aceptada' ];
        $__rechazada = $this->attributes[ 'rechazada' ];

        if( $__aceptada == 0 && $__rechazada == 0 )
        {
            return '<span class="label label-info"> PENDIENTE </span>';
        }
        elseif( $__aceptada == 1 && $__rechazada == 0 )
        {
            return '<span class="label label-success"> APROBADA </span>';
        }
        elseif( $__aceptada == 0 && $__rechazada == 1 )
        {
            return '<span class="label label-danger"> RECHAZADA </span>';
        }
    }

    //Obtenemos la fecha de cuando vence la cotizacion
    public function getFechaVencimiento()
    {
        $date_emision = new \Carbon\Carbon( $this->attributes[ 'fecha_emision' ] );
        $days = $this->attributes[ 'vigencia' ];
   
        return $date_emision->addDays( $days )->format( 'Y-m-d' );
    }

    //Verificamos los dias restantes de la cotizacion
    public function getStVencimiento()
    {
        $date_emision = new \Carbon\Carbon( $this->attributes[ 'fecha_emision' ] );
        $days = $this->attributes[ 'vigencia' ];

        $fecha_vencimiento = new \Carbon\Carbon( $date_emision->addDays( $days )->format( 'Y-m-d' ) );
        $date = new \Carbon\Carbon( Carbon::now()->format( 'Y-m-d' ) );

        if( $date <= $fecha_vencimiento )
        {
            return '<span class="text-info">'.$fecha_vencimiento->diffInDays( $date ).' días restantes</span>';
        }
        elseif( $date > $fecha_vencimiento )
        {
            return '<span class="text-danger">VENCIDA</span>';
        }
    }

    // Obtenemos la fecha de emision en letra
    public function getFechaEmision()
    {
        //$var = new \Carbon\Carbon( $this->attributes[ 'fecha_emision' ] );
        //$fecha = $var->format( 'l jS \\de F Y' );

        setlocale( LC_ALL,"es_ES@euro" ,"es_ES", "esp" );
        $fecha = strftime( "%d de %B de %Y", strtotime( $this->attributes[ 'fecha_emision' ] ) );

        return $fecha;
    }


    //Obtenemos el diffForHumans() de la fecha de aceptacion
    public function getDFHaceptada()
    {
        $fecha = new \Carbon\Carbon( $this->attributes[ 'fecha_aceptada' ] );
        $var = $fecha->diffForHumans();

        return $var;
    }


    //Obtenemos el diffForHumans() de la fecha de rechazo
    public function getDFHrechazada()
    {
        $fecha = new \Carbon\Carbon( $this->attributes[ 'fecha_rechazada' ] );
        $var = $fecha->diffForHumans();

        return $var;
    }


    // Obtenemos la fecha de registro de la cotización en letra
    public function getFechaRegistro()
    {
        return $this->getDateName( $this->attributes[ 'created_at' ] );
    }

    public function getFechaModificacion()
    {
        $__created = $this->attributes[ 'created_at' ];
        $__updated = $this->attributes[ 'updated_at' ];

        if( $__created == $__updated )
        {
            return 'No se ha modificado';
        }
        else
        {
            setlocale( LC_ALL,"es_ES@euro" ,"es_ES", "esp" );
            return $this->getDateName( $__updated  );
            //para la hora %X = 9:30:00  o %H:%M:%S = 09:30:00
        }

    }




     // --------- PRIVATES FUNCTIONS -----------

    /*
        - Para mostrar la fecha en letra, los acentos los muestra con un caracter raro.
        - Esta funcion verifica si la fecha cae en sábado o miércoles retornamos la palabra con acento en la a, 
          de lo contrario retornamos la fecha como tal.
        - Esta función recibe la fecha a analizar para verificar si cae en sábado, miércoles o no.
    */
    private function getDateName( $date )
    {
        setlocale( LC_ALL,"es_ES@euro" ,"es_ES", "esp" );

        // %w es para obtener la representación numérica del día de la semana, 0 (para Domingo) hasta 6 (para Sábado). 
        /*
            0-Domingo
            1-Lunes
            2-Martes
            3-Miércoles
            4-Jueves
            5-Vienres
            6-Sábado
         */
        //Verificamos si la fecha cae en '3' miércoles
        if( strftime( '%w', strtotime( $date ) ) == '3' )
        {
            return strftime( "El miércoles %d de %B del %Y a las %H:%M:%S", strtotime( $date ) );
        }
        //Verificamos si la fecha cae en '6' sábado
        elseif( strftime( '%w', strtotime( $date ) ) == '6' )
        {
            return strftime( "El sábado %d de %B del %Y a las %H:%M:%S", strtotime( $date ) );
        }
        else
        {
            return strftime( "El %A %d de %B del %Y a las %H:%M:%S", strtotime( $date ) );
        } 
    }
}
