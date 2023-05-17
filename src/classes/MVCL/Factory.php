<?php

namespace MxSoftstart\FrameworkPhp\classes\MVCL;

abstract class Factory {
    
    protected $namespace;   // classes (controllers & models).
    protected $path;        // files   (views & languages).

    /*
    protected $code;

    protected $module;
    
    protected $class;
    protected $file;
    protected $name;
    */

    public function __construct($namespace) {
        $this->namespace = $namespace;
    }
    
    public function getNamespace() {
        return $this->namespace;
    }

    public function getPath() {
        return $this->path;
    }

    /*

    public function getCode() {
        return $this->code;
    }

    public function getModule() {
        return $this->module;
    }
    
    public function getClass() {
        return $this->module;
    }

    public function getFile() {
        return $this->module;
    }

    public function getName() {
        return $this->name;
    }
    */

    // -----

    abstract public function get($code, $datas = null);
    
    // -----

    protected static function showError($error) {
        echo $error;
        exit();
    }
    
}

?>