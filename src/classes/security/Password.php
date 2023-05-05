<?php

/*
 * Esta función encapsula el origen de las configuraciones de la aplicación
 * facilitando la migración entre origenes distintos.
 * Debe usarse para el resto de las cofiguraciones que no son del core.
 */

 namespace MxSoftstart\FrameworkPhp\classes\security;

/*

example:

*/

class Password {

    public function __construct() {}

    public static function generate($lenght) {

        /* omito las letras muy parecidas*/
        
        $random = substr(str_shuffle(str_repeat("23456789abcdefghkmnpqrstuvwxyzABCDEFGHKMNPQRSTUVWXYZ*_-+", 1)), 0, $lenght);
        return $random;
    }
    
}

?>