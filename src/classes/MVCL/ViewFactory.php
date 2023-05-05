<?php

namespace MxSoftstart\FrameworkPhp\classes\MVCL;

class ViewFactory extends Factory {
        
    private $datas = array();
    
    public function __construct($path) {
        parent::__construct($path);
    }
    
    public function get($code) {
        
        //decode
        $parts = explode("-", $code);
        
        if (count($parts) !== 2) {
            $this->showError("el c&oacute;digo <b>" . $code . "</b> no es v&aacute;lido.");
        }
        
        $this->module = $parts[0];
        $this->name   = $code . "-view";
        $pathModule   = $this->path . "/" . getTemplate() . "/templates/" . $this->module;
        $pathView     = $pathModule . "/" . $this->name . ".php";
        
        //fabricar el objeto
        if (is_dir($pathModule . "/")) {
            if (is_file($pathView)) {
                
                extract($this->datas);
                
                $html = "";
                
                ob_start();
                
                //require en lugar de require once para poder cargarlo varias veces.
                require $pathView;
                
                $html = ob_get_contents();
                    
                ob_end_clean();
                
                return $html;
                
            } else {
                $this->showError("el archivo <b>" . $pathView . "</b> no existe.");
            }
        } else {
            $this->showError("el modulo <b>$pathModule</b> no existe.");
        }
    }
    
    public function setDatas($datas) {
        $this->datas = $datas;
    }
    
}
?>