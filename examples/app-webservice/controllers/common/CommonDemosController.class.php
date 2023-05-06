<?php

class CommonDemosController extends Controller {
	
	public function __construct() {
		
		parent::__construct();
	}
	
	public function index() {

		// return $this->response("OK", "");
		
		return $this->render("common-demos");

		// return loadView("app-login", $viewDatas);
	}
	
}

?>