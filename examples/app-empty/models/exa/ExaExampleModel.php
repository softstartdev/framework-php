<?php

namespace MxSoftstart\FrameworkPhp\AppEmpty\models\exa;

use MxSoftstart\FrameworkPhp\AppEmpty\classes\Model;

class ExaExampleModel extends Model {

    public function __construct() {

        parent::__construct();
    }
    
    public function get() {

        $sql = "SELECT * FROM EXAMPLES";
        $resp = $this->queryFirebird($sql);

        return $resp;
    }
    
    /*
    public function set() {
        
        $sql = "insert your code SQL here.";
        $resp = query($sql);
        return $resp;
    }
    */
    
}
?>