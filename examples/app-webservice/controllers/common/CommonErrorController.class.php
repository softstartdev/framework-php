<?php
class CommonErrorController extends Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		
		//error
		if (isset($_SESSION['error'])) {
			$error = $_SESSION['error'];
			unset($_SESSION['error']);
		} else {
			header("location: ./index.php");
			exit();
		}
		
		$this->viewDatas['error'] = $error;
		
		return $this->render("common-error");
	}
}
?>