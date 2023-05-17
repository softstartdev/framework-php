<?php

namespace MxSoftstart\FrameworkPhp\classes\MVCL;

class Router {
    
    private $datas = array();

    const TYPE_CONTROLLER   = 'controller';
    const TYPE_MODEL        = 'model';
    const TYPE_VIEW         = 'view';
    const TYPE_LANGUAGE     = 'language';
    
    public function __construct() { }
    
    // publico solo por si se necesita a futuro.
    
    /**
     * Type es 'model', ''
     */
    public static function decode($code, $type) {

        if ($code == null || $code == "") $code = "common-home-index";

        // ----

        $parts = explode("-", $code);
        
        $route = array();
        
        // Ejemplo:
        // controlador + accion por defecto

        if (count($parts) == 1) {

            /*
            $route['module'] 	 = '';
            $route['controller'] = $parts[0];
            $route['action']  	 = "index";
            */

            echo "codigo no válido.";
            exit();
        }

        // Ejemplos
        // common-home (modulo + controlador + accion por defecto index): Se comprueba si existe el modulo y se da prioridad.
        // home-sendDatas (sin modulo + controlador + accion concreta): Se comprueba la existencia del archivo.
        
        if(count($parts) == 2 && $parts[0] !== "" && $parts[1] !=="") {
            $route['module'] = $parts[0];
            $route[$type]    = $parts[1];
            $route['action'] = "index";
        }

        if (count($parts) == 3 && $parts[0] !== "" && $parts[1] !== "" && $parts[2] !== "") {
            $route['module'] = $parts[0];
            $route[$type]    = $parts[1];
            $route['action'] = $parts[2];
        }
        
        if (count($parts) > 3) {
            echo "codigo no válido.";
            exit();
        }
        
        // -----

        $route['code'] = $route["module"] . "-" . $route[$type];
        
        $route['class'] = ucfirst($route["module"]) . ucfirst($route[$type]) . ucfirst($type);
        $route['file'] = ucfirst($route["module"]) . ucfirst($route[$type]) . ucfirst($type) . ".php";
        $route['path'] = $route["module"] . "/" . ucfirst($route["module"]) . ucfirst($route[$type]) . ucfirst($type) . ".php";
        
        // Se conserva por motivos de compatibilidad.
        $route['name'] = ucfirst($route["module"]) . ucfirst($route[$type]) . ucfirst($type);
        
        return $route;
    }
    
    /*
    public static function loadController($path, $code) {

        $controllerFactory = new ControllerFactory($path);
        return $controllerFactory->get($code);
    }

    // Sistema de carga anterior.
    public static function run($path, $code) {

        $route  = self::decode($code);

        $code   = $route["module"] . "-" . $route["controller"];
        $metodo = $route["action"];

        $controller = self::loadController($path, $code);

        $reflexion  = new \ReflectionClass($controller->getName());
        if ($reflexion->hasMethod($metodo)) {
            return $controller->$metodo();
        } else {
            exit("El controlador <b>" . $controller->getName() . "</b> no tiene definido el metodo <b>{$metodo}</b>");
        }
    }
    */

    /*
    public static function run($namespace, $code) {

        $decoded = self::decode($code);
        
        $action = $decoded['action'];

        $mainController = $namespace . '\\' . $decoded['module'] . '\\' . $decoded['class'];
        $obj = new $mainController();
        $obj->setCode($decoded['code']);
        $obj->setName($decoded['class']);
        $obj->setModule($decoded['module']);
        return $obj->$action();
    }
    */

}