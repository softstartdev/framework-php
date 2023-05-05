<?php

namespace MxSoftstart\FrameworkPhp\classes\MVCL;

class ModelFactory extends Factory {
        
    public function __construct($path) {
        $this->path = $path;
    }
    
    public function get($code) {
        
        //decode
        $parts = explode("-", $code);
        
        if (count($parts) !== 2) {
            $this->showError("el c&oacute;digo <b>" . $code . "</b> no es v&aacute;lido.");
        }
        
        $this->module = $parts[0];
        $this->name   = ucfirst($parts[0]) . ucfirst($parts[1]) . "Model";
        $pathModule   = $this->path . "/" . $this->module;
        $pathModel 	  = $pathModule . "/" . $this->name . ".class.php";
        
        //fabricar el objeto
        if (is_dir($pathModule . "/")) {
            if (is_file($pathModel)) {
                
                require_once $pathModel;
                
                if (class_exists($this->name)) {
                    
                    $obj = new $this->name();
                    $obj->setCode($code);
                    $obj->setName($this->name);
                    $obj->setModule($this->module);
                    
                    return $obj;
                    
                } else {
                    $this->showError("la clase <b>" . $this->name . "</b> no esta declarada en <b>$pathModel</b>");
                }
                
            } else {
                $this->showError("el archivo <b>" . $pathModel . "</b> no existe.");
            }
        } else {
            $this->showError("el modulo <b>$pathModule</b> no existe.");
        }
    }
    
}
?>