<?php

/*
 * Esta función encapsula el origen de las configuraciones de la aplicación
 * facilitando la migración entre origenes distintos.
 * Debe usarse para el resto de las cofiguraciones que no son del core.
 */

namespace MxSoftstart\FrameworkPhp\classes\datas;

/*

example:

*/

class Config {

	public $configs = array();

	public $separator = ".";

    public function __construct() { }

	public function init($configs) {

		$this->configs = $configs;
	}

	public function loadFromPath($path, $environment) {
		$files = glob($path . "/*.php");
		foreach ($files as $file) {
			$this->loadFromFile($file, $environment);
		}
	}

	public function loadFromFile($file, $environment) {
		
		//echo $file . " ";
		//echo '***'.strpos($file, "-")."***<br/>";

		if (strpos(basename($file), "-") === false) {
			
			//echo "entre****";
			// es un archivo config normal, se carga.

			require_once($file);
			$this->configs = array_merge_recursive($this->configs, $config);

		} else {

			// es un config con entorno, verificar el entorno.

			if (strpos(basename($file), $environment) === false) {

				// no es el environment solicitado, ignorarlo.

			} else {
				//echo "entre";
				// es el environment solicitado, cargarlo.
				
				require_once($file);
				$this->configs = array_merge_recursive($this->configs, $config);
			}
		}
	}

	public function set($key, $value) {

		$parts = explode($this->separator, $key);

		if (count($parts) == 1) {
			$key1 = strtoupper($parts[0]);
			$this->configs[$key1] = $value;
		}

		if (count($parts) == 2) {
			$key1 = strtoupper($parts[0]);
			$key2 = strtoupper($parts[1]);
			$this->configs[$key1][$key2] = $value;
		}

		if (count($parts) == 3) {
			$key1 = strtoupper($parts[0]);
			$key2 = strtoupper($parts[1]);
			$key3 = strtoupper($parts[2]);
			$this->configs[$key1][$key2][$key3] = $value;
		}

		if (count($parts) == 4) {
			$key1 = strtoupper($parts[0]);
			$key2 = strtoupper($parts[1]);
			$key3 = strtoupper($parts[2]);
			$key4 = strtoupper($parts[3]);
			$this->configs[$key1][$key2][$key3][$key4] = $value;
		}
	}

	public function get($key) {
		
		$parts = explode($this->separator, $key);

		if (count($parts) == 1) {
			$key1 = strtoupper($parts[0]);
			if (isset($this->configs[$key1])) {
				return $this->configs[$key1];
			} else {
				if (@constant(strtoupper($key1))) {
					return constant(strtoupper($key1));
				} else {
					exit("No existe la configuracion solicitada: " . $key. ".");
				}
			}
		}

		if (count($parts) == 2) {
			$key1 = strtoupper($parts[0]);
			$key2 = strtoupper($parts[1]);
			if (isset($this->configs[$key1][$key2])) {
				return $this->configs[$key1][$key2];
			} else {
				exit("No existe la configuracion solicitada: " . $key. ".");
			}
		}

		if (count($parts) == 3) {
			$key1 = strtoupper($parts[0]);
			$key2 = strtoupper($parts[1]);
			$key3 = strtoupper($parts[2]);
			if (isset($this->configs[$key1][$key2][$key3])) {
				return $this->configs[$key1][$key2][$key3];
			} else {
				exit("No existe la configuracion solicitada: " . $key. ".");
			}
		}

		if (count($parts) == 4) {
			$key1 = strtoupper($parts[0]);
			$key2 = strtoupper($parts[1]);
			$key3 = strtoupper($parts[2]);
			$key4 = strtoupper($parts[3]);
			if (isset($this->configs[$key1][$key2][$key3][$key4])) {
				return $this->configs[$key1][$key2][$key3][$key4];
			} else {
				exit("No existe la configuracion solicitada: " . $key. ".");
			}
		}
	}
	
	public function getAll() {
		return $this->configs;
	}

}
?>