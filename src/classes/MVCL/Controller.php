<?php

namespace MxSoftstart\FrameworkPhp\classes\MVCL;

abstract class Controller {
	
    private	$code	= "";
    private	$name	= "";
    private	$module = "";
    
    //protected $user;
    
    //private $errors = array();
    
    //protected $viewDatas = array();
    
    //protected $layoutDatas = array();
    
    //private $response = array();
    
    public function __construct() {
        
        //$this->user = new User();
        
        /*
        $this->response['status']   = 'OK';
        $this->response['messages'] = array();
        $this->response['datas']    = "";
        $this->response['total']    = 0;
        */
    }
    
    //getters -----------------------------
    
    public function getCode() {
        return $this->code;
    }
    
    public function setCode($code) {
        $this->code = $code;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getModule() {
        return $this->module;
    }
    
    public function setModule($module) {
        $this->module = $module;
    }
    
    //methods -------------------------------
    
    abstract function index();
    
    /*
    public function render($code) {
        
        $headerController = loadController("common-header");
        $footerController = loadController("common-footer");
        
        $this->layoutDatas['header']  = $headerController->index();
        $this->layoutDatas['code']    = $code;
        $this->layoutDatas['r']       = getParameter("r", "REQUEST", null);
        $this->layoutDatas['content'] = loadView($code, $this->viewDatas);
        $this->layoutDatas['footer']  = $footerController->index();
        
        return loadView("common-layout", $this->layoutDatas);
    }
    */

    /*
        //TEST
        // Se usa para web services.
        protected function response() {
    
            // Variables de respuesta para webservices.
            header('Content-Type: application/json');
    
            $json = toJson($this->response);
            
            // return JSON, JSON/CORS or JSONP.
            return (getParameter('callback') != null)? getParameter('callback') . "(" . $json . ")" : $json;
        }
    */

    /*
        protected function response($code, $datas, $total = "") {
            
            // Variables de respuesta para webservices.
            header('Content-Type: application/json');
    
            $response = array();
    
            $response['status'] = $code;
            
            if ($code == "ERROR") {
                $response['messages'] = $datas;
                //$response['datas'] = "";
            } else {
                //$response['messages'] = array();
                $response['datas'] = $datas;
            }
            
            if ($total !== "") {
                $response['total'] = $total;
            }
            
            if (isset($_GET['d'])) {
                print_r($response);
            }
    
            $json = toJson($response);
    
            // return JSON, JSON/CORS or JSONP.
            return (getParameter('callback') != null)? getParameter('callback') . "(" . $json . ")" : $json;
        }
    */
    
    
    
    // Se copio del framework para que la clase sea auto contenida.
    /*
    protected function getParameter($key, $method = 'GET', $value = null) {
        
        if (strpos($key, "[") == false) {
            
            if ($method == 'POST') {
                if (isset($_POST[$key])) {
                    $value = $_POST[$key];
                }
            } else if ($method == 'REQUEST') {
                if (isset($_REQUEST[$key])) {
                    $value = $_REQUEST[$key];
                }
            } else {
                if (isset($_GET[$key])) {
                    $value = $_GET[$key];
                }
            }
            
        } else {
            
            $key    = str_replace("]", "", $key);
            $parts  = explode("[", $key);
            $key    = $parts[0];
            $subkey = $parts[1];
            
            if ($method == 'POST') {
                if (isset($_POST[$key][$subkey])) {
                    $value = $_POST[$key][$subkey];
                }
            } else if ($method == 'REQUEST') {
                if (isset($_REQUEST[$key][$subkey])) {
                    $value = $_REQUEST[$key][$subkey];
                }
            } else {
                if (isset($_GET[$key][$subkey])) {
                    $value = $_GET[$key][$subkey];
                }
            }
        }
        
        // Para strings de tipo fecha.

        if ($this->isString($value)) {

            $parts = explode('/', $value);

            if (count($parts) == 3) {
                if (strlen($parts[0]) == 2 && strlen($parts[1]) == 2 && strlen($parts[2]) >= 4) {

                    $day 	= $parts[0];
                    $month 	= $parts[1];
                    $year 	= $parts[2];
                    
                    $parts2 = explode(':', $year);
                    
                    if (strlen($parts2[0])  == 7 && strlen($parts2[1])  == 2 && strlen($parts2[2])  == 2) {
                        $parts3 = explode(' ', $year);
                        $value =  $parts3[0] . '-' . $month . '-' . $day . ' ' . $parts3[1];
                    } else if(strlen($parts2[0]) == 4) {
                        $value =  $year . '-' . $month . '-' . $day . ' 00:00:00';
                    }
                }
            }
        }
        
        return $value;
    }
    */

    // Se copio del framework para que la clase sea auto contenida.
    /*
    private function isString($value) {
        return $value !== null && is_string($value);
    }
    */

}
?>