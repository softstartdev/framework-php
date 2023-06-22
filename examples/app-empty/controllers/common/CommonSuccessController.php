<?php

namespace MxSoftstart\FrameworkPhp\AppEmpty\controllers\common;

use MxSoftstart\FrameworkPhp\AppEmpty\classes\Controller;

class CommonSuccessController extends Controller {
	
	function __construct() {
		
		parent::__construct();
	}

	public function index($datas = null) {

		//success
		if (isset($_SESSION['success'])) {
			$success = $_SESSION['success'];
			unset($_SESSION['success']);
		} else {
			header("location: ./index.php");
			exit();
		}
		
		$this->viewDatas['success'] = $success;
		
		return $this->render($this->getCode());
	}
	
	/*
	public function index() {

		$registersModel = loadModel("common-registers");
		
		$registerId = getParameter("id", "REQUEST", null);

		if (isNull($registerId)) {

			$_SESSION['error'] = "El campo id es obligatorio.";
			
			header("location: ./index.php?r=common-error");
			exit();

		} else {
			
			$registers = $registersModel->get(
				array("*"), 
				array(
					"id" => $registerId
				)
			);
			
			if (count($registers) == 0) {

				$_SESSION['error'] = "No se encontró el registro.";
				
				header("location: ./index.php?r=common-error");
				exit();
			}
		}
		
		$this->viewDatas['register'] = $registers[0];

		if (isset($_SESSION['notifyNewLead'])) {
			$this->viewDatas['showTagLead'] = true;
			unset($_SESSION['notifyNewLead']);
		} else {
			$this->viewDatas['showTagLead'] = false;
		}
		
		return $this->render("common-success");
	}
	*/
}
?>