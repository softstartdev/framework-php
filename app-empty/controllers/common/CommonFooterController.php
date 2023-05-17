<?php

namespace MxSoftstart\FrameworkPhp\AppWebservice\controllers\common;

use MxSoftstart\FrameworkPhp\AppWebservice\classes\Controller;

class CommonFooterController extends Controller {
	
	function __construct() {
		
		parent::__construct();
	}
	
	public function index($datas = null) {
		
		$this->viewDatas['l'] = $this->loadLanguage($this->getCode());
		
		$this->viewDatas['c'] = $this;
		$this->viewDatas['ic'] = $datas['invokerController'];
		return $this->loadView($this->getCode(), $this->viewDatas);
	}
	
}
?>