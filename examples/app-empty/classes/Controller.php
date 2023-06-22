<?php

namespace MxSoftstart\FrameworkPhp\AppEmpty\classes;

use MxSoftstart\FrameworkPhp\classes\MVCL\Router;
//use MxSoftstart\FrameworkPhp\classes\MVCL\ControllerFactory;
use MxSoftstart\FrameworkPhp\classes\MVCL\Controller as STFController;
use MxSoftstart\FrameworkPhp\classes\MVCL\ViewFactory;
//use MxSoftstart\FrameworkPhp\classes\datas\Config;
use MxSoftstart\FrameworkPhp\classes\datas\Parameters;
use MxSoftstart\FrameworkPhp\classes\datas\Response as Response;
use MxSoftstart\FrameworkPhp\AppEmpty\classes\User;

abstract class Controller extends  STFController {
    
    protected $user;
    
    protected $errors = array();
    
    protected $viewDatas = array();
    
    //protected $layoutDatas = array();

    function __construct() {

        parent::__construct();

        $this->user = new User($this->getConfig('APP.NAME'));
	}
    
    // -------

    public function getConfig($key) {

        global $config;

        return $config->get($key);
    }

    public function getParameter($key, $method = 'REQUEST', $default = null) {
        
        return Parameters::get($key, $method, $default);
    }

    public function getParameters($keys, $method = 'REQUEST', $default = null) {

        $datas = array();
        foreach ($keys as $item) {

            $tmp = str_replace("]", "", $item);
            $parts = explode('[', $tmp);
            
            $key = $parts[0];
            $subkey = $parts[1];
            
            $datas[$subkey] = $this->getParameter($item, $method, $default);
        }

        return $datas;
    }
    
    // -------

    public function validateAuth() {

        //echo "entre";

        if (
            $this->getParameter('user') !== $this->getConfig("ENVIRONMENT.USERS.ROOT.USER") ||
            $this->getParameter('password') !== $this->getConfig("ENVIRONMENT.USERS.ROOT.PASSWORD")
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

    // -------

    /**
     * Solo es para prueba, todas las conexiones deben hacerse a travez de un modelo.
    */
    
    public function queryFirebird($sql) {

        global $databaseFirebird;
        
        return $databaseFirebird->query($sql);
    }
    
    public function queryMySQL($sql) {

        global $databaseMySQL;
        
        return $databaseMySQL->query($sql);
    }
    
    // -------

    public function response($code, $messages = array(), $datas = null, $total = "") {

        header('Content-Type: application/json');   
        echo Response::encode($code, $messages, $datas, $total);
        exit();
    }

    public function render() {

        $headerController = $this->loadController("common-header");
        $header = $headerController->index(array(
                "invokerController" => $this
            )
        );
        
        $content = $this->loadView($this->getCode(), $this->viewDatas);

        $footerController = $this->loadController("common-footer");
        $footer = $footerController->index(array(
            "invokerController" => $this
        ));

        // -----

        $layoutController = $this->loadController("common-layout");
        $layout = $layoutController->index(array(
            "invokerController" => $this,
            "header" => $header,
            "content" => $content,
            "footer" => $footer
        ));
        
        return $layout;
    }
    
    // -------

    public function loadController($code) {

        global $controllerFactory;

        $decoded = Router::decode(
            $code, 
            Router::TYPE_CONTROLLER
        );
        return $controllerFactory->get($decoded);
    }
    
    public function loadModel($code) {

        global $modelFactory;
        
        $decoded = Router::decode(
            $code, 
            Router::TYPE_MODEL
        );
        return $modelFactory->get($decoded);
    }
    
    public function loadView($code, $datas) {

        global $viewFactory;

        $decoded = Router::decode(
            $code,
            Router::TYPE_VIEW
        );
        
        return $viewFactory->get($decoded, $datas);
    }
    
    public function loadLanguage($code) {

        global $languageFactory;

        $decoded = Router::decode(
            $code,
            Router::TYPE_VIEW
        );
        
        return $languageFactory->get($decoded);
    }

    // -------

    /*
    * Devuelve el lenguage actual de la aplicación que puede no ser
    * el definido por defecto en la configuración de la aplicación. 
    */

    public function getCodeLanguage() {
        return $_SESSION['_LANGUAGE_'];
    }

    /*
    * Devuelve la url de una imagen, css o js desde la carpeta img de la plantilla.
    */
    
    public function getResource($type, $image) {
        //img, css, js.
        return $this->getConfig("ENVIRONMENT.URL") . 'views/' . $this->getConfig("SETTINGS.TEMPLATE") . '/' . $type . '/' . $image;
    }

}
?>