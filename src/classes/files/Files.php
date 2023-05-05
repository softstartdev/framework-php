<?php

/**
 * Genera un nombre para poder guardar en disco.
 */

namespace MxSoftstart\FrameworkPhp\classes\files;

/*

example:

*/

class Files {

    public function __construct() {}

    public static function generateName($name, $addDate = true, $addRandom = true, $separator = "@") {
        
        // Separar información.
        $parts = pathinfo($name);
        $name = $parts['basename'];
        $extension = $parts['extension'];
        
        // Cambiar espacios en blanco a guiones medios.
        $name2 = str_replace (" ", "-", $name);
        
        // Eliminar la extensión del nombre.
        $name3 = str_replace ("." . $extension, "", $name2);
        
        // Verificar que el nombre sea solo alfanumérico.
        $name4 = preg_replace("[^A-Za-z0-9]", "", $name3);
        
        // Comenzar formación del nuevo nombre.
        
        $newName = $name4;
        
        if ($addDate == true) $newName .= $separator . date('YmdHis');
        
        if ($addRandom == true) $newName .= $separator . str_pad(rand(1, 1000000), 7, "0");
        
        $newName .= '.' . $extension;
        
        return $newName;
    }

    /**
     * Borra un directorio entero aunque tenga archivos y carpetas internas.
     */
    public static function unlinkRecursive($folder) {
        foreach (glob($folder . "/*") as $file) {          
            if (is_dir($file)) {
                $this->unlinkRecursive($file);
            } else {
                unlink($file);
            }
        }
        rmdir($folder);
    }

}

?>