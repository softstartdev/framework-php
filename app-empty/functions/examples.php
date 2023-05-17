<?php

/*
 * Al momento de ejecutar este archivo config.php ya ha sido cargado,
 * pero el core no ha sido inicializado, por lo que es un momento ideal
 * para sobre-escribir las funciones del core.
 * 
 * Como las funciones del core no han sido cargadas deben usarse funciones
 * nativas de php.
 * 
 * En este archivo tambien debe definirse la funciones propias de la aplicación.
 */

function AnExample($string) {
	
	return "Hello " . $string;
}

/*
// Ejemplo de sobreescritura de una función del core.
function getConfig($name) {
	
	$resp = query("SELECT `value` FROM settings WHERE `name` = '{$name}'");
	if (count($resp) > 0) {
		return $resp[0]['value'];
	} else {
		if (@constant(strtoupper($name))) {
			return constant(strtoupper($name));
		} else {
			exit("No se ha definido la constante: " . $name);
		}
	}
}
*/

?>