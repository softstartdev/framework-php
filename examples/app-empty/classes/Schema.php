<?php

namespace MxSoftstart\FrameworkPhp\AppEmpty\classes;

use MxSoftstart\FrameworkPhp\classes\databases\SQL\Schema as STFSchema;

abstract class Schema extends  STFSchema {

    function __construct() {

        parent::__construct();
    }
    
    public function addControlFields() {

        $this->addField("IsActive", "BOOL");

        $this->addField("appUsers_Id_Added", "ID");
        $this->addField("appUsers_Id_Edited", "ID");
        $this->addField("appUsers_Id_Deleted", "ID");
        
        $this->addField("DateAdded", "DATETIME");
        $this->addField("DateEdited", "DATETIME");
        $this->addField("DateDeleted", "DATETIME");
    }
    
}

?>