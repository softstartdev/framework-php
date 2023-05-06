<?php

/**
 * Carga personalizada de Softstart Framework PHP V3.
 */

// -------

// Configuraciones del servidor.

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

// -------

require_once "../../vendor/autoload.php";

// Config.
use MxSoftstart\FrameworkPhp\classes\datas\Config as Config;
use MxSoftstart\FrameworkPhp\classes\databases\Firebird\Instance as DatabaseFirebird;
use MxSoftstart\FrameworkPhp\classes\datas\Parameters as Parameters;
use MxSoftstart\FrameworkPhp\classes\MVCL\Router as Router;

$config = new Config();
$config->loadFromPath(dirname(__FILE__) . '/configs', 'develop');

print_r($config);
// Database.

$databaseFirebird = new DatabaseFirebird();
$databaseFirebird->connect($config->get('ENVIRONMENT.DATABASES.FIREBIRD_DEFAULT'));

// Load custom functions.

// Se carga desde composer.

/*
$functions = glob($config->get('PATHS.FUNCTIONS') . "/*.php");
foreach ($functions as $item) {
	require_once($item);
}
*/

// Load custom classes.

// Se carga desde composer;

/*
$classes = glob($config->get('PATHS.CLASSES') . "/*.class.php");
foreach ($classes as $item) {
	require_once($item);
}
*/

// Launch -------

echo Router::run(
	"MxSoftstart\FrameworkPhp\AppWebservice\controllers",
	Parameters::get("r", 'GET', "common-home-index")
);

?>