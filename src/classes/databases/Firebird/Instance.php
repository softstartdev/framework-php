<?php

namespace MxSoftstart\FrameworkPhp\classes\databases\Firebird;

class Instance {
    
    private $conn = null;
    
    public function __construct() {}
    
    public function connect($server) {

        if ($this->conn == null) {

            $this->conn = ibase_connect($server["HOST"] . "/" . $server["PORT"] . ":" . $server["PATH"] . "/" . $server["FILE"], $server["USER"], $server["PASSWORD"], "utf-8");

            if ($this->conn == false) {
                printf("Error en la conexion: %s\n", ibase_errmsg());
                exit();
            }
        }
    }

    /*
    public function queries($sqls) {

        $this->conn->autocommit(false);
        
        try {

            foreach ($sqls as $sql) $this->conn->query($sql);
            $this->conn->commit();

        } catch (Exception $e) {
            $this->conn->rollback();
            echo 'Something fails: ',  $e->getMessage(), "\n";
            exit("No se pudo ejecutar la transacción SQL");
        }
    }
    */

    public function query($sql) {

        /*
        $tr = ibase_trans();
        $sql ="INSERT ...";
        $q = ibase_query($tr, $sql);
        ibase_commit($tr);
        */

        $result = array();
        $result["status"] = "OK";

        $results = ibase_query($this->conn, $sql) or die (ibase_errmsg());
        //var_dump($results);
        //echo "|" . gettype($results) . "|";
        
        //$result["resource"] = $results;
        
        //interbase result
        //if ($results instanceof result) {
        if (gettype($results) == "resource") {

            $i = 0;
            $datas = array();
            
            while ($row = ibase_fetch_assoc($results)) {
                $datas[] = $row;
                $i++;
            }
            
            $result["datas"] = $datas;
            $result["total"] = $i;

            ibase_free_result($results);

        } else {
            //$datas = $this->conn->insert_id;
            $result["newId"] = "No aplica para esta base de datos.";
        }

        return $result;
    }
    
    public function disconnect() {

        /*
         * En case de que se haga una segunda llamada a ibase_connect() con los mismos argumentos, 
         * no se establecerá un nuevo enlace, en cambio, el identificador de enlace previamente abierto 
         * será devuelto. El enlace al servidor será cerrado apenas finalice la ejecución del script, 
         * a menos que sea cerrado prematuramente llamando explícitamente.
        */

        ibase_close($this->conn);
    }

}

?>