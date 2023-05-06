<?php

namespace MxSoftstart\FrameworkPhp\AppWebservice\classes;

use MxSoftstart\FrameworkPhp\classes\MVCL\Controller as STFController;
use MxSoftstart\FrameworkPhp\classes\datas\Parameters;

abstract class Controller extends  STFController {
    
    function __construct() {

        parent::__construct();
	}
    
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
    
    public function queryFirebird($sql) {

        global $databaseFirebird;
        
        return $databaseFirebird->query($sql);
    }
    
}
?>