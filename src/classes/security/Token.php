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

class Token {

    public function __construct() {}

	/*
	* Codifica un token de session.
	*/
	public static function encode($sessionId, $secret) {

		return $sessionId . "|" . md5($sessionId . $secret);
	}
	
	/*
	* decodifica un token de session
	*/
	public static function  decode($token, $secret) {
		
		$parts		= explode("|", $token);
		$sessionId 	= $parts[0];
		$sign      	= $parts[1];
		
		if (md5($sessionId . $secret) == $sign) {
			return $sessionId;
		} else {
			return false;
		}
	}
}

?>