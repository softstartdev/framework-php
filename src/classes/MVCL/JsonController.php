<?php

namespace MxSoftstart\FrameworkPhp\classes\MVCL;

use MxSoftstart\FrameworkPhp\classes\MVCL\Controller;
use MxSoftstart\FrameworkPhp\classes\time\Date;

abstract class JsonController extends Controller {
    
    public $model   = null;
    public $keyId   = "id";
    public $keyNew  = "NEW";

    function __construct() { }
    
    public function get() {

        $fields  = isset($_REQUEST['query']['fields'])  ? $_REQUEST['query']['fields']  : "";
        $filters = isset($_REQUEST['query']['filters']) ? $_REQUEST['query']['filters'] : "";
        $orders  = isset($_REQUEST['query']['orders'])  ? $_REQUEST['query']['orders']  : "";
        $start   = isset($_REQUEST['query']['start'])   ? $_REQUEST['query']['start']  : null;
        $limit   = isset($_REQUEST['query']['limit'])   ? $_REQUEST['query']['limit']  : null;

        // -----
        
        $errors = array();

        if ($fields == "") $errors[] = "La solicitud no tiene campos.";
        
        if (count($errors) > 0) {
            return $this->response("ERROR", $errors, "");
            exit();
        }
        
        // -----
        
        $response = $this->model->get(array(
            "fields"  => $fields,
            "filters" => $filters,
            "orders"  => $orders,
            "start"   => $start,
            "limit"   => $limit
        ));
        
        //Formateado de fechas para la UI.
        foreach($response['datas'] as &$item) {
            foreach($item as $key => &$value) {
                $myDate = new Date($value);
                if ($myDate->isDate()) {
                    $value = $myDate->getFormated("dd-mm-YYYY hh:mm:ss");
                }
            }
        }
        
        //d($response);
        //exit();
        
        return $this->response("OK", array("Operación realizada con éxito"), $response['datas'], $response['total']);
    }
    
    public function set() {

        $datas = $_REQUEST["datas"];
        
        // -----

        //Formateado de fechas para la base de datos.

        foreach($datas as $key => &$value) {
            $myDate = new Date($value);
            if ($myDate->isDate()) {
                $value = $myDate->getFormated("YYYY-mm-dd hh:mm:ss");
            }
        }
        
        // -----

        $errors = array();

        if ($datas[$this->keyId] == "") $errors[] = "Envía un identificador (" . $this->keyId . ") válido.";
        
        if (count($errors) > 0) {
            return $this->response("ERROR", $errors, "");
            exit();
        }
        
        // -----
        
        /*
        if ($datas[$this->keyId] == $this->keyNew) {

            $original = array(
                $this->keyId => ""
            );
            
        } else {
            $response = $this->model->get(array(
                "fields" => "Id"
                "where" = 
                array(
                    "key" => "id",
                    "operator" => "=",
                    "value" => $datas[$this->keyId]
                )
            ));
            $original = $response[0];
        }

        $modified = array_merge($original, $datas);

        $modified = $this->model->set($modified);
        */

        $modified = $this->model->set($datas);
        
        return $this->response("OK", array("Operación realizada con éxito"), $modified);
    }
    
    public function del() {

        $datas = $_REQUEST["datas"];
        
        // -----
        
        $errors = array();

        if ($datas[$this->keyId] == "") $errors[] = "Envía un identificador (" . $this->keyId . ") válido.";
        
        if (count($errors) > 0) {
            return $this->response("ERROR", $errors, "");
            exit();
        }
        
        // -----
        
        $this->model->del(array(
            $this->keyId => $datas[$this->keyId]
        ));
        
        return $this->response("OK", array("Operación realizada con éxito"), "");
    }
    
    public abstract function response($code, $messages = array(), $datas = null, $total = "");

}

?>