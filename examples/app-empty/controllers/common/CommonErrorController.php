<?php

namespace MxSoftstart\FrameworkPhp\AppWebservice\controllers\common;

use MxSoftstart\FrameworkPhp\AppWebservice\classes\Controller;

class CommonErrorController extends Controller {
	
	function __construct() {
		
		parent::__construct();
	}
	
	public function index($datas = null) {
		
		//error
		if (isset($_SESSION['error'])) {
			$error = $_SESSION['error'];
			unset($_SESSION['error']);
		} else {
			header("location: ./index.php");
			exit();
		}
		
		$this->viewDatas['error'] = $error;
		
		return $this->render($this->getCode());
	}
	
}
?>