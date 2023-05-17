<?php

/*
 * Plantilla de inicio de framework.
 * Inicializa todas las caracteristicas del Framework.
 * Si no se desea usar todos los componentes, puede crear uno personalizado basado en este.
 * /

/*
 * Author:  Softstart Technologies.
 * Name:    PHP Framework 2023.
 * Version: 3.0.0
 */

/*
 * NOTES:
 * Este archivo solo debe ser cargado en el index.php y en ninguna otra parte mas.
 */

// Configuraciones del servidor. --------------------

// Definir zona horaria.

date_default_timezone_set("America/Mérida");// America/Mexico_City

// Definir tiempo maximo de ejecucion.

set_time_limit(0);
ini_set('max_execution_time', '0');

// Definir opciones de debug.

error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE);

// Permitir cross domain a webservices.

header("access-control-allow-origin: *");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

// Load core libraries -------------------------------

//require_once dirname(__FILE__) . '/library/conekta/Conekta.php';
//require_once dirname(__FILE__) . '/library/VTiger/VTigerAPI.class.php';

// Load core functions -------------------------------

// ...

// Load core classes ---------------------------------

/*
require_once dirname(__FILE__) . '/classes/curl/Curl.class.php';

require_once dirname(__FILE__) . '/classes/databases/MySQL/Instance.class.php';
require_once dirname(__FILE__) . '/classes/databases/Firebird/Instance.class.php';
require_once dirname(__FILE__) . '/classes/databases/SQL/Generator.class.php';

require_once dirname(__FILE__) . '/classes/datas/Config.class.php';
require_once dirname(__FILE__) . '/classes/datas/Parameters.class.php';
require_once dirname(__FILE__) . '/classes/datas/Response.class.php';

require_once dirname(__FILE__) . '/classes/files/Files.class.php';

require_once dirname(__FILE__) . '/classes/format/Formater.class.php';

require_once dirname(__FILE__) . '/classes/MVCL/ControllerFactory.class.php';
require_once dirname(__FILE__) . '/classes/MVCL/ViewFactory.class.php';
require_once dirname(__FILE__) . '/classes/MVCL/ModelFactory.class.php';
require_once dirname(__FILE__) . '/classes/MVCL/LanguageFactory.class.php';
require_once dirname(__FILE__) . '/classes/MVCL/Controller.class.php';
require_once dirname(__FILE__) . '/classes/MVCL/Model.class.php';
require_once dirname(__FILE__) . '/classes/MVCL/Router.class.php';
//require_once dirname(__FILE__) . '/classes/MVCL/Factory.class.php';

require_once dirname(__FILE__) . '/classes/office/excel.class.php';
require_once dirname(__FILE__) . '/classes/office/PDF.class.php';

require_once dirname(__FILE__) . '/classes/security/Captcha.class.php';
require_once dirname(__FILE__) . '/classes/security/Cryptography.class.php';
require_once dirname(__FILE__) . '/classes/security/Password.class.php';
require_once dirname(__FILE__) . '/classes/security/Token.class.php';
require_once dirname(__FILE__) . '/classes/security/Validator.class.php';

require_once dirname(__FILE__) . '/classes/smtp/Mail.class.php';

require_once dirname(__FILE__) . '/classes/testing/Debug.class.php';

require_once dirname(__FILE__) . '/classes/User.class.php';
//require_once dirname(__FILE__) . '/classes/App.class.php';
*/

// Load custom configs

//exit();

// Load custom functions

/*

$functions = glob(getPathFunctions() . "/*.php");
foreach ($functions as $item) {
	require_once($item);
}
*/

// Load custom classes

/*
$classes = glob(getPathClasses() . "/*.class.php");
foreach ($classes as $item) {
	require_once($item);
}
*/

//LAUNCH APP ------------------------------



// Iniciar sessión.

if(getParameter('token') !== null){
	
	$sessionId = decodeToken(getParameter('token'));
	
	if($sessionId !== false){
		session_id($sessionId);
		session_start();
	}else{
		echo "Token de acceso no es válido.";
		exit();
	}
}else{
	session_start();
}

/*
 * Decodificar las variables si vienen en el body en formato json.
 * Esto debe detectarse automáticamente por una cabecera, si post no existe o algo asi.
 * Tener ciudado que no intefiera con el seo.
 *
if(REQUEST_JSON_MODE){
	$fileContents = file_get_contents('php://input');
	if($fileContents == ""){
		$fileContents = "{}";
	}
	$_POST = get_object_vars(json_decode($fileContents));
}
*/

// Habilitar la seguridad de las vistas.

define("IS_INDEX", true);

//validate configurations.

getAppName();
getAppVersion();
getAppUrl();
run();

// lanzar la aplicación.

// Funciones de lanzamiento de la aplicación.
// TEST: Verificar si puede regresar un 404 si no se encuentra.
// header("HTTP/1.0 404 Not Found");

/*
function run(){
	
	setLanguage();
	$r = ST\Parameters::get('r');
	$route  = ST\mvcl\Router::decode();
	$code   = $route["module"] . "-" . $route["controller"];
	$metodo = $route["action"];
	
	$controller = loadController($code);
	$reflexion  = new ReflectionClass($controller->getName());
	if($reflexion->hasMethod($metodo)){
		echo $controller->$metodo();
	}else{
		exit("El controlador <b>" . $controller->getName() . "</b> no tiene definido el metodo <b>{$metodo}</b>");
	}
}
*/

$path = $ST_config->get('ENVIRONMENT.PATHS.CONTROLLERS');
$r = ST\Parameters::get("r");

echo ST\mvcl\Router::run($r);

/*
//TEST
function run(){

	$route = getRoute();

	if($route["module"] != null && $route["controller"] != null && $route["action"] != null){

		$code = $route["module"] . "-" . $route["controller"];
		$controller = loadController($code);

		header("HTTP/1.0 404 Not Found");
			if($controller != null){

			$reflexion = new ReflectionClass($controller->name);

			$metodo = $route["action"];

			if($reflexion->hasMethod($metodo)){
				echo $controller->$metodo();
			}else{
				// la clase no tiene definido el metodo.
				header("HTTP/1.0 404 Not Found");
			}
		}else{
			// no se encontro el controlador.
		}
	}else{
		// ruta no valida.
		header("HTTP/1.0 404 Not Found");
	}
}
*/

function setLanguage(){
	if(getParameter("l") !==  null && getParameter("l") !== ""){
		if(is_dir(getPathLanguages() . "/" . getParameter("l"))){
			$_SESSION['_LANGUAGE_'] = getParameter("l");	
		}else{
			$_SESSION['_LANGUAGE_'] = getLanguage();
		}
	}if(isset($_SESSION['_LANGUAGE_']) && $_SESSION['_LANGUAGE_'] !== null && $_SESSION['_LANGUAGE_'] !== ""){
		//conservar el lenguage
	}else{
	    $_SESSION['_LANGUAGE_'] = getLanguage();
	}
}

/*
function getRoute(){
	
	$route = array();
	
	if(getParameter("r") == null || getParameter("r") == ""){
		
		$route['module'] 	 = "common";
		$route['controller'] = "home";
		$route['action']  	 = "index";
		
	}else{
	
		$parts = explode("-", getParameter("r"));
	    	
	    if(count($parts) == 3 && $parts[0] !== "" && $parts[1] !== "" && $parts[2] !== ""){
	    	$route['module'] 	 = $parts[0];
			$route['controller'] = $parts[1];
			$route['action']  	 = $parts[2];
	    }else if(count($parts) == 2 && $parts[0] !== "" && $parts[1] !==""){
	     	$route['module'] 	 = $parts[0];
			$route['controller'] = $parts[1];
			$route['action']  	 = "index";
	    }else{
	    	$route['module'] 	 = "common";
			$route['controller'] = "home";
			$route['action']  	 = "index";
	    }
	    
	}
	
    return $route;
}
*/


?>