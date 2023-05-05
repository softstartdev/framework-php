<?php

/**
 * Esta clase no está terminada.
 */

namespace MxSoftstart\FrameworkPhp\classes\enties;

class App {

	public $configs = array();

	public function __construct($configs) {

		$this->configs = $configs;

		$this->loadConfigs();
		$this->loadFunctions();
		$this->loadClasses();
	}

	private function loadConfigs() {

		$functions = glob($this->getPathConfigs() . "/*.php");
		
		foreach ($functions as $item) {
			require_once($item);
		}

		$this->configs = $configs;
	}

	private function loadFunctions() {
		$functions = glob($this->getPathFunctions() . "/*.php");
		foreach ($functions as $item) {
			require_once($item);
		}
	}
	
	private function loadClasses() {

	}
}

?>