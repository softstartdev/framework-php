<?php
/*


/ *
 * Devuelve la instacia de un controlador.
 * /

if (!function_exists("STmvclLoadController")) {
	function STmvclLoadController($path, $code) {
		
		$controllerFactory = new STControllerFactory($path);
		return $controllerFactory->get($code);
	}
}

/ *
 * Devuelve una vista renderizada.
 * /
if (!function_exists("STmvclLoadView")) {
	function STmvclLoadView($path, $code, $datas = array()) {
		
		$viewFactory = new STViewFactory($path);
		$viewFactory->setDatas($datas);
		
		return $viewFactory->get($code);
	}
}

/ *
 * Devuelve la instacia de un modelo.
 * /
if (!function_exists("STmvclLoadModel")) {
	function STmvclLoadModel($path, $code) {
		$modelFactory = new STModelFactory($path);
		return $modelFactory->get($code);
	}
}

/ *
 * Devuelve la instacia de un lenguage.
 * /
if (!function_exists("STmvclLoadLanguage")) {
	function STmvclLoadLanguage($path, $code) {
		$languageFactory = new STLanguageFactory($path);
		return $languageFactory->get($code);
	}
}
*/
?>