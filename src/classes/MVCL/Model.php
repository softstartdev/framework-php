<?php

namespace MxSoftstart\FrameworkPhp\classes\MVCL;

abstract class Model {
    
    private $namespace;

    private $path;

    private $code;

    private $module;
    
    private $class;
    private $file;
    private $name;
    
    public function __construct() {
        /*
        if(getDatabaseName() == "" || getDatabaseUser() == ""){
            echo "BD_HOST o BD_NAME o BD_USER o BD_PASSWORD no estan definidos.";
            exit();
        }
        */
    }
    
    //getters ---------------
    
    public function getNamespace() {
        return $this->namespace;
    }
    
    public function setNamespace($namespace) {
        $this->code = $namespace;
    }

    public function getPath() {
        return $this->path;
    }
    
    public function setPath($path) {
        $this->path = $path;
    }

    public function getCode() {
        return $this->code;
    }
    
    public function setCode($code) {
        $this->code = $code;
    }
    
    public function getModule() {
        return $this->module;
    }
    
    public function setModule($module) {
        $this->module = $module;
    }

    public function getClass() {
        return $this->class;
    }
    
    public function setClass($class) {
        $this->class = $class;
    }

    public function getFile() {
        return $this->file;
    }
    
    public function setFile($file) {
        $this->file = $file;
    }

    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    /*
    abstract function get($datas = null);
    
    abstract function set($datas = null);
    
    abstract function del($datas = null);
    */
}

?>