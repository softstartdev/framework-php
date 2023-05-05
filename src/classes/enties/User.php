<?php

/*
 * This class manage the user session cicle life.
 */

 namespace MxSoftstart\FrameworkPhp\classes\enties;

class User {
	
	// Para cada aplicación tenga su espacio de ejecución.
	private $SESSION_NAME;
	
	public function __construct($appName) {
		$this->SESSION_NAME = '_USER_' . strtoupper($appName) . "_";
	}
	
	public function isLogued() {

		return isset($_SESSION[$this->SESSION_NAME]);
	}
	
	public function login($user) {
		
		$_SESSION[$this->SESSION_NAME] = $user;
		//$_SESSION[$this->SESSION_NAME]['sessionId'] = session_id();
		//$_SESSION[$this->SESSION_NAME]['token'] = encodeToken(session_id());
		
		return $_SESSION[$this->SESSION_NAME];
	}
	
	public function getLogued() {

		return $_SESSION[$this->SESSION_NAME];
	}
	
	public function logout() {

		unset($_SESSION[$this->SESSION_NAME]);
	}
	
}
?>