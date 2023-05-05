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

class Validator {

    public function __construct() { }
	
	public static function isNull($value) {

		// Veirfica si es null.
		return $value == null;
	}

	public static function isNotNull($value) {
		return $value !== null;
	}

	public static function isString($value) {

		// Verifica si es null.
		// Verifica si es string.
		return $value !== null && is_string($value);
	}

	public static function isNotString($value) {
		return $value == null || !is_string($value);
	}

	public static function isStringEmpty($value) {

		// Verifica si es null.
		// Verifica si es string.
		// Verifica si esta vacio.
		return $value == null || !is_string($value) || $value == "";
	}

	public static function isNotStringEmpty($value) {
		
		return $value !== null && is_string($value) && $value !== "";
	}

	public static function isStringNumeric($value) {

		// Verifica si es null.
		// Verifica si es string.
		// Verifica si esta vacio.
		// Verifica si lo que está escrito es un numero.

		return $value !== null && is_string($value) && is_numeric($value);
	}

	public static function isNotStringNumeric($value) {

		return $value == null || !is_string($value) || !is_numeric($value);
	}

	public static function isStringId($value){

		// Verifica si es null.
		// Verifica si es string.
		// Verifica si esta vacio.
		// Verifica si lo que está escrito es un numero.
		// Verifica que el número sea mayor a cero.

		return $value !== null && is_string($value) && is_numeric($value) && $value > 0;
	}

	public static function isNotStringId($value) {
		return $value == null || !is_string($value) || !is_numeric($value) || $value <= 0;	
	}

	public static function isAllowString($string, $allows) {
		$parts = explode("|", $allows);
		return in_array($string, $parts);
	}

	public static function isNotAllowString($string, $allows) {
		$parts = explode("|", $allows);
		return !in_array($string, $parts);
	}

	public static function isAllowImage($FILES, $allows = null) {

		// print_r($FILES);
		if ($allows == null) {
			$allows = array(
				"types" => array("image/gif", "image/jpeg", "image/png", "image/jpeg", "image/x-icon"),
				"size"  => 200 * 1024 * 1000,//200MB
				"extensions" => array("jpg", "JPG", "jpeg", "JPEG", "gif", "GIF", "png", "PNG", "ico", "ICO")
			);
		}
		
		if ($FILES['error'] !== UPLOAD_ERR_OK) {
			return false;
		}
		
		if (!in_array($FILES['type'], $allows['types'])) {
			return false;
		}
		
		if ($FILES['size'] > $allows['size']) {
			return false;
		}
		
		$parts = pathinfo($FILES['name']);
		$extension = $parts['extension'];
		
		if (!in_array($extension, $allows['extensions'])) {
			return false;
		}
		
		return true;
	}

	public static function isNotAllowImage($type, $allows = "image/gif|image/jpeg|image/png|image/jpeg") {
		$parts = explode("|", $allows);
		return !in_array($type, $parts);
	}

	public static function isAllowFile($FILES, $allows = null) {

		// print_r($FILES);
		if ($allows == null) {
			$allows = array(
				"types" => array(
					"application/msword",
					"application/vnd.openxmlformats-officedocument.wordprocessingml.document",
					"application/vnd.ms-excel",
					"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
					"application/vnd.ms-powerpoint",
					"application/vnd.openxmlformats-officedocument.presentationml.presentation",
					"text/plain",
					"text/csv",
					"application/json",
					"application/vnd.oasis.opendocument.text",
					"application/vnd.oasis.opendocument.presentation",
					"application/vnd.oasis.opendocument.spreadsheet",
					"application/pdf",
					"application/x-rar-compressed",
					"application/x-tar",
					"application/zip",
					"application/x-7z-compressed",
					"application/octet-stream",
					// image
					"image/gif",
					"image/jpg",
					"image/jpeg",
					"image/png"
				),
				"size" => 200 * 1024 * 1000,//200MB
				"extensions" => array(
					"doc", "docx", "xls", "xlsx", 
					"ppt", "pptx", "txt", "csv", 
					"json", "odt", "odp", "ods", 
					"pdf", "rar", "tar", "zip", 
					"7z",
					// image
					"jpg", "jpeg", "png", "gif"
				)
			);
		}
		
		if ($FILES['error'] !== UPLOAD_ERR_OK) {
			return false;
		}
		
		if (!in_array($FILES['type'], $allows['types'])) {
			return false;
		}
		
		if ($FILES['size'] > $allows['size']) {
			return false;
		}
		
		$parts = pathinfo($FILES['name']);
		$extension = $parts['extension'];
		
		if (!in_array($extension, $allows['extensions'])) {
			return false;
		}
		
		return true;
	}

	public static function isStringDateTime($value) {
		$parts = explode('-', $value);
		$response = false;
		
		if (count($parts) == 3) {
			if (strlen($parts[0]) == 4 && strlen($parts[1]) == 2 && strlen($parts[2]) >= 11) {
				$response = true;	
			}
		}

		return $response;
	}

	public static function isNotStringDateTime($value) {
		$parts = explode('-', $value);
		$response = true;
		if (count($parts) == 3) {
			if (strlen($parts[0]) == 7 && strlen($parts[1]) == 2 && strlen($parts[2]) >= 4) {
				$parts2 = explode(':', $parts[2]);
				if(strlen($parts2[0])  == 7 && strlen($parts2[1])  == 2 && strlen($parts2[2])  == 2){
					$response = false;
				}
			}
		}
		return $response;
	}

}

?>