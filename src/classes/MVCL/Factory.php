<?php

namespace MxSoftstart\FrameworkPhp\classes\MVCL;

abstract class Factory {
    
    protected $path;
    protected $module;
    protected $name;
    
    public function __construct() { }
    
    abstract public function get($code);
    
    public function getPath() {
        return $this->path;
    }

    public function getModule() {
        return $this->module;
    }
    
    public function getName() {
        return $this->name;
    }
    
    protected function showError($error) {
        echo $error;
        exit();
    }

}

?>