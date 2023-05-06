<?php
class CommonHomeController extends Controller {
	
	function __construct() {

		parent::__construct();
	}
	
	public function index() {
		return $this->render("common-dashboard");
	}
	
}
?>