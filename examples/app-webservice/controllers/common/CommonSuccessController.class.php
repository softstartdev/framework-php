<?php
class CommonSuccessController extends Controller {
	
	function __construct() {
		parent::__construct();
	}
	
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
}
?>