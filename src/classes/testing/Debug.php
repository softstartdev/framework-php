<?php

/*
 * Esta función encapsula el origen de las configuraciones de la aplicación
 * facilitando la migración entre origenes distintos.
 * Debe usarse para el resto de las cofiguraciones que no son del core.
 */

 namespace MxSoftstart\FrameworkPhp\classes\testing;

/*

example:

*/

class Debug {

    public function __construct() {}

    /**
     * Habilita o deshabilita el reporte de errores de PHP.
     */
    public static function enable($value) {
		if ($value == true) {
			error_reporting(E_ALL);
		} else {
			error_reporting(0);
		}
	}

    /*
    * Devuelve un debug formateado.
    */
    public static function print($datas, $exit = false) {
        
		echo "<pre>" . print_r($datas, true) . "</pre>";

		if($exit) exit();
	}

}

?>