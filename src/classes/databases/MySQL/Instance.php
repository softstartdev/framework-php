<?php

/*
 * Una funcion sin dependencias para conectar a la base de datos.
 * Esta funcion se puede envolver en una que ya tenga los datos de configuración y solo se necesite la llamada.
 */

/*

$mysql = STmysqlConnect(arrar(
	"host" => "localhost",
	"port" => "3306",
	"user" => "root",
	"password" => "",
	"database" => "example",
);
$mysql->execQuery("SELECT * FROM table");
$mysql->disconnect();

*/

namespace MxSoftstart\FrameworkPhp\classes\databases\MySQL;

class Instance {
    
    private $conn = null;
    
    public function __construct() { }
    
    public function connect($server) {

        if ($this->conn == null) {

            $this->conn = new mysqli($server["HOST"], $server["USER"], $server["PASSWORD"], $server["NAME"], $server["PORT"]);
            
            if (mysqli_connect_errno()) {
                printf("Error en la conexion: %s\n", mysqli_connect_error());
                exit();
            }

            if (!$this->conn->set_charset("utf8")) {
                printf("Error cargando el conjunto de caracteres utf8: %s\n", $this->conn->error);
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

        $result = array();
        $result["status"] = "OK";

        $this->conn->autocommit(true);

        $results = $this->conn->query($sql) or die($this->conn->error . __LINE__);
        $result["resource"] = $results;

        if ($results instanceof mysqli_result) {
            
            $i = 0;
            $datas = array();
            
            while ($row = $results->fetch_assoc()) {
                $datas[] = $row;
                $i++;
            }

            $result["datas"] = $datas;
            $result["total"] = $i;

        } else {
            $result["newId"] = $this->conn->insert_id;
        }
        
        return $result;
    }
    
    public function disconnect() {

        /*
         * Las conexiones MySQL no persistentes abiertas y los conjuntos de resultados se 
         * cierran automáticamente cuando se destruyen sus objetos. El cierre explícito de 
         * conexiones abiertas y la liberación de conjuntos de resultados es opcional. 
         * Sin embargo, es una buena idea cerrar la conexión tan pronto como el script termine de 
         * realizar todas las operaciones de la base de datos, si todavía tiene mucho procesamiento 
         * por hacer después de obtener los resultados.
        */

        $this->conn->close();
    }

}

?>