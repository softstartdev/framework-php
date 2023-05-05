<?php

/*
 * Devuelve una variable o un valor en caso de no haberlo encontrado.
 * Funciona con variable simple y variable array.
 * datas[users]
 */

 namespace MxSoftstart\FrameworkPhp\classes\datas;

/*

example:

*/

class Parameters {

    public function __construct() {}

    public static function get($key, $method = 'GET', $value = null) {

        if (strpos($key, "[") == false) {

            if ($method == 'POST') {
                if (isset($_POST[$key])) {
                    $value = $_POST[$key];
                }
            } else if ($method == 'REQUEST') {
                if (isset($_REQUEST[$key])) {
                    $value = $_REQUEST[$key];
                }
            } else {
                if (isset($_GET[$key])) {
                    $value = $_GET[$key];
                }
            }
            
        } else {
            
            $key    = str_replace("]", "", $key);
            $parts  = explode("[", $key);
            $key    = $parts[0];
            $subkey = $parts[1];
    
            if ($method == 'POST') {
                if (isset($_POST[$key][$subkey])) {
                    $value = $_POST[$key][$subkey];
                }
            } else if ($method == 'REQUEST') {
                if (isset($_REQUEST[$key][$subkey])) {
                    $value = $_REQUEST[$key][$subkey];
                }
            } else {
                if (isset($_GET[$key][$subkey])) {
                    $value = $_GET[$key][$subkey];
                }
            }
        }
        
        //if (isString($value)){
        if (is_string($value)) {
            $parts = explode('/', $value);
            if (count($parts) == 3) {
                if (strlen($parts[0]) == 2 && strlen($parts[1]) == 2 && strlen($parts[2]) >= 4) {
                    
                    $day 	= $parts[0];
                    $month 	= $parts[1];
                    $year 	= $parts[2];
                    
                    $parts2 = explode(':', $year);
                    if (strlen($parts2[0])  == 7 && strlen($parts2[1])  == 2 && strlen($parts2[2])  == 2) {
                        $parts3 = explode(' ', $year);
                        $value =  $parts3[0] . '-' . $month . '-' . $day . ' ' . $parts3[1];
                    } else if(strlen($parts2[0]) == 4) {
                        $value =  $year . '-' . $month . '-' . $day . ' 00:00:00';
                    }
                }
            }
        }
        
        return $value;
    }
    
}

?>