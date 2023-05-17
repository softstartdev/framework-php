<?php

namespace MxSoftstart\FrameworkPhp\classes\MVCL;

class LanguageFactory extends Factory {
    
    private $lang;

    public function __construct($path, $lang = 'es') {
        $this->lang = $lang;
        $this->path = $path;
    }
    
    public function get($decoded, $datas = null, $lang = null) {
        
        if ($lang == null) {
            $lang = $this->lang;
        }
        
        $pathModule   = $this->path . "/" . $lang . "/" . $decoded["module"];
        $pathLanguage = $pathModule . "/" . $decoded['code'] . "-language.php";

        if (is_dir($pathModule . "/")) {
            if (is_file($pathLanguage)) {
                
                $l = array();
                
                require $pathLanguage;
                
                return $l;
                
            } else {
                $this->showError("el archivo <b>" . $pathLanguage . "</b> no existe.");
            }
        } else {
            $this->showError("el modulo <b>$pathModule</b> no existe.");
        }
    }
    
    /*
    public function get($code, $datas = null) {
        
        //decode
        $parts = explode("-", $code);
        
        if (count($parts) !== 2) {
            $this->showError("el c&oacute;digo <b>" . $code . "</b> no es v&aacute;lido.");
        }
        
        $this->module = $parts[0];
        $this->name   = $code . "-language";
        $pathModule   = $this->path . "/" . getCodeLanguage() . "/" . $this->module;
        $pathLanguage = $pathModule . "/" . $this->name . ".php";
        
        //fabricar el objeto
        if (is_dir($pathModule . "/")) {
            if (is_file($pathLanguage)) {
                
                $l = array();
                
                require_once $pathLanguage;
                
                return $l;
                
            } else {
                $this->showError("el archivo <b>" . $pathLanguage . "</b> no existe.");
            }
        } else {
            $this->showError("el modulo <b>$pathModule</b> no existe.");
        }
    }
    */
}

?>