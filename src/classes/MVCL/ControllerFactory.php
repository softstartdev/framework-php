<?php

namespace MxSoftstart\FrameworkPhp\classes\MVCL;

use MxSoftstart\FrameworkPhp\classes\MVCL\Factory;

class ControllerFactory extends Factory {
    
    public function __construct($namespace) {

        $this->namespace = $namespace;
    }
    
    public function get($decoded, $datas = null) {

        $controller = $this->namespace . '\\' . $decoded['module'] . '\\' . $decoded['class'];
        
        $obj = new $controller();
        $obj->setNamespace($this->namespace);
        $obj->setPath($decoded['path']);
        $obj->setCode($decoded['code']);
        $obj->setModule($decoded['module']);
        $obj->setClass($decoded['class']);
        $obj->setFile($decoded['file']);
        $obj->setName($decoded['name']);
        
        return $obj;
    }
    
    /*
        // Sistema anterior.
        public function get($code) {

            //var_dump(parent);
            //print_r($this);
            //print_r($this->path);

            //echo ":::".$this->path.":::";
            
            //decode
            $parts = explode("-", $code);
            
            if (count($parts) !== 2) {
                $this->showError("el c&oacute;digo <b>" . $code . "</b> no es v&aacute;lido.");
            }
            
            $this->module   = $parts[0];
            $this->name     = ucfirst($parts[0]) . ucfirst($parts[1]) . "Controller";
            $pathModule     = $this->path . "/" . $this->module;
            $pathController = $pathModule . "/" . $this->name . ".php";
            
            //fabricar el objeto
            if (is_dir($pathModule . "/")) {
                if (is_file($pathController)) {
                    
                    require_once $pathController;
                    
                    if (class_exists($this->name)) {
                        
                        $obj = new $this->name();
                        $obj->setCode($code);
                        $obj->setName($this->name);
                        $obj->setModule($this->module);
                        
                        return $obj;
                        
                    } else {
                        $this->showError("la clase <b>" . $this->name . "</b> no esta declarada en <b>$pathController</b>");
                    }
                    
                } else {
                    $this->showError("el archivo <b>" . $pathController . "</b> no existe.");
                }
            } else {
                $this->showError("el modulo <b>$pathModule</b> no existe.");
            }
            
        }
    */
    
}
?>