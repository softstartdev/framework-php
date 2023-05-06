<?php
class CommonFooterController extends Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		
		return loadView("common-footer");
	}
}
?>