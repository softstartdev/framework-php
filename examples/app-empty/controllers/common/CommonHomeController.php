<?php

namespace MxSoftstart\FrameworkPhp\AppEmpty\controllers\common;

use MxSoftstart\FrameworkPhp\AppEmpty\classes\Controller;
use MxSoftstart\FrameworkPhp\AppEmpty\schemas\ExaExamplesSchema;

class CommonHomeController extends Controller {

	function __construct() {
		
		parent::__construct();
	}
	
	public function index($datas = null) {

		return "Hola mundo!!";
	}
	
	/*
	public function indexText() {

		$l = $this->loadLanguage($this->getCode());
		
		return $l["hello_world"] . ": " . $this->getConfig('APP.NAME') . "!!!";
	}

	public function indexWS() {

		$l = $this->loadLanguage($this->getCode());
		//print_r($l);

		$this->validateAuth();
		
		$sql = 'SELECT * FROM EXAMPLES';
		
		$resp = $this->queryFirebird($sql);
		
		return $this->response("OK", array("Operacion realizada con éxito"), $resp['datas'], $resp['total']);
	}

	public function indexHTML() {

		$exaExampleModel = $this->loadModel('exa-example');

		$resp = $exaExampleModel->get();

		d($resp);

		$this->viewDatas['l']  = $this->loadLanguage($this->getCode());

		return $this->render($this->getCode());
	}

	public function createDatabaseWS() {

		$exaExamplesSchema = new ExaExamplesSchema();
		d($exaExamplesSchema->build());
	}
	*/
}
?>