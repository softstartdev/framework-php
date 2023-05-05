<?php

/*
 * Sirve para hacer llamadas GET y POST un servidor HTTP externo.
 * Depende de la libreria curl de php.
*/

namespace MxSoftstart\FrameworkPhp\classes\curl;

/*

example:

$string = STcurlGet("google.com", array(
    "name1" => "value1",
    "name2" => "value2"
));

$string = STcurlGet("google.com?name1=value1&name2=value2");

// ------

$string = STcurlPost("google.com", array(
    "name1" => "value1",
    "name2" => "value2"
));
*/

class Curl {

    public function __construct() {}

    public static function requestGET($url, $params = null) {

        if ($params == null) {
            $stringParams = "";//Quiere decir que las variables están en la url.
        } else {
            $stringParams = "";
            foreach ($params as $key => $value) {
                $stringParams .= ($stringParams == "") ? "?" : "&";
                $stringParams .= $key . "=" . urlencode($value);
            }
        }
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . $stringParams);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response; 
    }

    public static function requestPost($url, $params) {

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        $response = curl_exec($curl);
        curl_close($curl);
        
        return $response;
    }
    
}

?>