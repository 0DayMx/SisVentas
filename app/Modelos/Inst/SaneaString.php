<?php

namespace sisventas\Modelos\Inst;

use Illuminate\Database\Eloquent\Model;

class SaneaString extends Model
{
    //Función para sanear el nombre 
    public static function sanear_string($string)
    {
        $string = trim($string);
 
        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );
 
        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );
 
        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );
 
        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );
 
        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç', '+', '$', '%', '&', '/', '!', '¡', '@', '~', 'º', '[', ']', '{', '}', ';', ':', '´'),
            array('n', 'N', 'c', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
            $string
        );

        $string = str_replace(
            array('#', '¿','?', '<code>', "'", '*'),
            array('', '', '', '', '', ''),
            $string
        );       
                
        return $string;
        
    }
}
