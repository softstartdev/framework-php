<?php

namespace MxSoftstart\FrameworkPhp\classes\MVCL;

use MxSoftstart\FrameworkPhp\classes\time\Date;
//use MxSoftstart\FrameworkPhp\AppEmpty\classes\Model;
//use MxSoftstart\FrameworkPhp\classes\
//databases\MySQL\Instance as InstanceMySQL;

abstract class JsonModel {

    public $path = "";

    function __construct($path) {

        $this->path = $path;
    }
    
    public function get($params) {

        $datas = array();
        
        $all  = scandir($this->path . "/");
        
        foreach ($all as $file => $name) {
            if (!is_dir($this->path . "/" . $name)) {
                
                if(strpos($name, ".json") == false) continue;
                if(strpos($name, ".delete") !== false) continue;

                $json = json_decode(file_get_contents($this->path . "/" . $name), true);
                $datas[] = $json;
            }
        }
        
        // --------

        if (count($params) > 0) {
            for ($i=0; $i < count($params); $i++) {
                $this->filter($datas, $params[$i]);
            }
        }

        return $datas;
    }
    
    public function set($params) {

        if ($params["id"] == "NEW") {
            $params["id"] = $this->getNextId();
        }

        $json = json_encode($params, JSON_PRETTY_PRINT);
        
        file_put_contents($this->path . "/" . $params["id"] . ".json", $json);
        chmod($this->path . "/" . $params["id"] . ".json", 0777);

        return $params;
    }
    
    public function del($params) {

        rename($this->path . "/" . $params["id"] . ".json", $this->path . "/" . $params["id"] . ".json.deleted");
    }
    
    // ------

    public function filter (&$datas, $filter) {

        $key        = $filter["key"];
        $operator   = $filter["operator"];
        $value      = $filter["value"];
        
        if (is_numeric($value)) {
            $type = "number";
        } else {
            $myDate = new Date($value);
            if ($myDate->isDate()) {
                $type = "date";
            } else {
                if ($value == "true" || $value == "true") {
                    $type = "boolean";
                } else {
                    $type = "string";
                }                
            }
        }

        //echo $type;

        // -------

        $tmp = array();

        if ($type == "number") {

            if ($operator == "<") {
                foreach ($datas as $data) {
                    if($data[$key] < $value) {
                        $tmp[] = $data;
                    }
                }
            }
            
            if ($operator == ">") {
                foreach ($datas as $data) {
                    if($data[$key] > $value) {
                        $tmp[] = $data;
                    }
                }
            }
            
            if ($operator == "=") {
                foreach ($datas as $data) {
                    if ($data[$key] == $value) {
                        $tmp[] = $data;
                    } else {
                        // Nada.
                    }
                }
            }
        }

        if ($type == "date") {

            if ($operator == "<") {
                foreach ($datas as $data) {

                    $dateEnd1 = new Date($data[$key]);
                    $dateEnd1 = strtotime($dateEnd1->getFormated("YYYY-mm-dd hh:mm:ss"));
                    
                    $dateEnd2 = new Date($value);
                    $dateEnd2 = strtotime($dateEnd2->getFormated("YYYY-mm-dd hh:mm:ss"));
                    
                    if ($dateEnd1 < $dateEnd2) {
                        $tmp[] = $data;
                    }
                }
            }
            
            if ($operator == ">") {
                foreach ($datas as $data) {
                    
                    $dateEnd1 = new Date($data[$key]);
                    $dateEnd1 = strtotime($dateEnd1->getFormated("YYYY-mm-dd"));
                    //echo "(" . $key . ")" . $data[$key] . "-";
                    
                    $dateEnd2 = new Date($value);
                    $dateEnd2 = strtotime($dateEnd2->getFormated("YYYY-mm-dd"));
                    //echo $value . ",";

                    if ($dateEnd1 > $dateEnd2) {
                        $tmp[] = $data;
                    }
                }
            }
    
            if ($operator == "=") {
                foreach ($datas as $data) {

                    $dateEnd1 = new Date($data[$key]);
                    $dateEnd1 = strtotime($dateEnd1->getFormated("YYYY-mm-dd"));

                    $dateEnd2 = new Date($value);
                    $dateEnd2 = strtotime($dateEnd2->getFormated("YYYY-mm-dd"));

                    if ($dateEnd1 == $dateEnd2) {
                        $tmp[] = $data;
                    }
                }
            }
        }

        if ($type == "string") {

            if ($operator == "=") {
                foreach ($datas as $data) {
                    if($data[$key] == $value) {
                        $tmp[] = $data;
                    }
                }
            }

            if ($operator == "LIKE") {
                foreach ($datas as $data) {
                    if (strpos($this->simplifyString($data[$key]), $this->simplifyString($value)) !== false) {
                        $tmp[] = $data;
                    }
                }
            }
        }

        if ($type == "boolean") {

            if ($operator == "=") {
                //echo "entre =";
                foreach ($datas as $data) {
                    //echo $data[$key] . "-" . $value . ", ";
                    if($data[$key] == $value) {
                        $tmp[] = $data;
                    }
                }
            }

            if ($operator == "!=") {
                //echo "entre !=";
                foreach ($datas as $data) {
                    if($data[$key] !== $value) {
                        $tmp[] = $data;
                    }
                }
            }
        }

        //echo "|";
        $datas = $tmp;
        //return $tmp;
    }

    public function getNextId() {

        $lastId = $this->getLastId();

        $nextId = $lastId + 1;
        
        file_put_contents($this->path . "/quantity.txt", $nextId);

        return $nextId;
    }

    public function getLastId() {
            
        if (!file_exists($this->path . "/quantity.txt")) {
            file_put_contents($this->path . "/quantity.txt", "0");
        }
        
        return file_get_contents($this->path . "/quantity.txt");
    }
    
    private function simplifyString($string) {
        
        $string = strtoupper($string);
        $string = str_replace("Á", "A", $string);
        $string = str_replace("É", "E", $string);
        $string = str_replace("Í", "I", $string);
        $string = str_replace("Ó", "O", $string);
        $string = str_replace("Ú", "U", $string);
        
        $string = str_replace("á", "A", $string);
        $string = str_replace("é", "E", $string);
        $string = str_replace("í", "I", $string);
        $string = str_replace("ó", "O", $string);
        $string = str_replace("ú", "U", $string);
        
        return $string;
    }

}

?>