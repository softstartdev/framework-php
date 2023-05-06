<?php

namespace MxSoftstart\FrameworkPhp\AppWebservice\classes;

use MxSoftstart\FrameworkPhp\AppWebservice\classes\Controller;
use MxSoftstart\FrameworkPhp\classes\datas\Response as Response;

abstract class Webservice extends Controller {

	function __construct() {

        parent::__construct();
	}

    public function validateAuth() {

        //echo "entre";

        if (
            $this->getParameter('user') !== $this->getConfig("USERS.ROOT.USER") ||
            $this->getParameter('password') !== $this->getConfig("USERS.ROOT.PASSWORD")
        ) {
            return $this->response(
				"ERROR",
				array(
					"Envia un usuario válido",
					"Enviar una contraseña válida"
				)
			);
        }
    }
    
    public function response($code, $messages = array(), $datas = null, $total = "") {

        header('Content-Type: application/json');   
        echo Response::encode($code, $messages, $datas, $total);
        exit();
    }
    
}

?>