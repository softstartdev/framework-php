<?php

namespace MxSoftstart\FrameworkPhp\classes\datas;

abstract class Response {
    
    function __construct() { }

    public static function encode($code, $messages = array(), $datas = null, $total = "") {

        /*
         * $datas puede tomar cualquiera de estos tipos de datos
         * null, boolean, int, float, string
         * array, array-asociativo
         */
        
        // Los nulos pasan normal
        // Los boleanos pasan normal
        // Los enteros pasan normal
        // Los flotantes pasan normal
        // Los strings pasan normal
        
        // Los arrays asosiativos se examinan
        // Los arrays normales se examinan sus elementos.

        // -------

        // si es un array
        if (is_array($datas)) {

            //si es un array normal
            if (array_keys($datas) === range(0, count($datas) - 1)) {

                // verificar cada elemento del array.
                foreach ($datas as &$data) {

                    //todos los elementos pasan menos los arrays asociativos.
                    
                    if (is_array($data)) {
                        if (array_keys($data) === range(0, count($data) - 1)) {
                            //Es array normal.
                        } else {

                            //verificamos cada field del array asociativo.
                            $keys = array_keys($data);
                            foreach ($keys as $key) {
                                
                                $parts = explode("_", $key);
                                if (substr($parts[1], 0, 2) == "Is"  || substr($parts[1], 0, 4) == "Have") {
                                    $data[$key] = $this->formatBoolean($data[$key]);
                                }
                            }
                        }
                    }

                }
                
            } else {

                if (is_array($datas)) {
                    if (array_keys($datas) === range(0, count($datas) - 1)) {
                        //Es array normal.
                    } else {
                        //verificamos cada field del array asociativo.
                        $keys = array_keys($datas);
                        foreach ($keys as $key) {
                            $parts = explode("_", $key);
                            if (substr($parts[1], 0, 2) == "Is"  || substr($parts[1], 0, 4) == "Have") {
                                $datas[$key] = $this->formatBoolean($datas[$key]);
                            }
                        }
                    }
                }

            }
        }
        
        // -----------
        
        // Variables de respuesta para webservices.
        //header("access-control-allow-origin: *");
        //header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
        
        $response = array();
        $response['status']     = $code;
        $response['messages']   = $messages;
        $response['datas']      = $datas;

        if ($total !== "") {
            $response['total'] = $total;
        }
        
        if (isset($_GET['d'])) {
            $json = json_encode($response, JSON_PRETTY_PRINT);
        } else {
            $json = json_encode($response);
        }

        // return JSON, JSON/CORS or JSONP.
        return (isset($_GET['callback'])) ? $_GET['callback'] . "(" . $json . ")" : $json;
    }
    
    private function formatBoolean($value) {

        $formatBoolean = isset($_GET['formatBoolean']) ? $_GET['formatBoolean'] : 'false';
        
        if ($formatBoolean == "zero") {
            return ($value == 1) ? 1 : 0;
        }
        
        if ($formatBoolean == "zero_string") {
            return ($value == 1) ? "1" : "0";
        }
        
        if ($formatBoolean == "false") {
            return ($value == 1) ? true : false;
        }
        
        if ($formatBoolean == "false_string") {
            return ($value == 1) ? "true" : "false";
        }
        
        if ($formatBoolean == "empty") {
            return ($value == 1) ? "1" : "";
        }
    }
    
}
?>