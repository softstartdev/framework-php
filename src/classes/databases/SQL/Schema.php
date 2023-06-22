<?php

namespace MxSoftstart\FrameworkPhp\classes\databases\SQL;

abstract class Schema {
    
    private $name = "";// Nombre en plural con scope. Ej: appUsers
    private $fields = array();

    public function __construct() { }

    // scope + table name.
    public function setName($name) {

        $this->name = $name;
        
        // Se agrega el Id de primero automaticamente.
        $this->addField($this->name . "_Id", "ID");
    }

    // Formato: scope + plural table name + singular field name + comment.
    public function addField($name, $type, $size = null) {

        // tipos: ID, REF, VARCHAR, INT, FLOAT, TEXT, BOOL, DATETIME

        if ($size == null && $type == 'ID')         $size = 11;
        //if ($size == null && $type == 'REF')        $size = 11; //Id de otra tabla (referencia).
        if ($size == null && $type == 'VARCHAR')    $size = 255;
        if ($size == null && $type == 'INT')        $size = 10;
        if ($size == null && $type == 'FLOAT')      $size = 10.4;
        if ($size == null && $type == 'TEXT')       $size = null;
        if ($size == null && $type == 'BOOL')       $size = null;
        if ($size == null && $type == 'DATETIME')   $size = null;
        
        if ($type == 'ID' || $type == 'REF') {
            $this->fields[] = array(
                "name" => $name,
                "type" => $type, 
                "size" => $size
            );
        } else {
            $this->fields[] = array(
                "name" => $this->name . "_" . $name,
                "type" => $type, //ID, VARCHAR, INT, FLOAT, TEXT, BOOL
                "size" => $size
            );
        }
    }
    
    abstract public function create();
    
    abstract public function addControlFields();
    
    public function build() {
        
        $this->create();
        $this->addControlFields();
        
        return array(
            "name" => $this->name,
            "fields" => $this->fields
        );
    }

}

?>