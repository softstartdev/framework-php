<?php

namespace MxSoftstart\FrameworkPhp\AppWebservice\controllers\common;

use MxSoftstart\FrameworkPhp\AppWebservice\classes\Controller;

//use function Mxsoftstart\AppWebserviceAdor\functions\d;

class CommonHomeController extends Controller {

	function __construct() {

		parent::__construct();
	}
	
	public function index() {
        
		$appName = $this->getConfig('APP.NAME');
		
		
		//MxSoftstart\AppWebserviceAdor\functions\d("sasas");
		d(array("hola", "mundo"));
		
		return "Hola mundo " . $appName . "!!!";
	}
	
}
?>