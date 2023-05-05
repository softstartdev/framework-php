<?php

/*
 * Esta función encapsula el origen de las configuraciones de la aplicación
 * facilitando la migración entre origenes distintos.
 * Debe usarse para el resto de las cofiguraciones que no son del core.
 */

namespace MxSoftstart\FrameworkPhp\classes\databases\SQL;

/*

example:

*/

class Generator {
	
    public function __construct() {}
	
    /*
	$sql = createSelect(array(
		"table" => "usrUsers u",
		"fields" => array(
			'u.usrUsers_NameFirst',
			'u.usrUsers_NameLast'
		),
		"joins" => array(
			"LEFT JOIN usrUsersDetail d" => "d.usrUsers_Id = u.usrUsers_Id",
			"INNER JOIN usrUsersDetail d" => "d.usrUsers_Id = u.usrUsers_Id"
		),
		"where" => array(
			"u.usrUsers_Id" => "2",
			"u.usrUsers_Status" => "1"
		),
		"filters" => array(
			"u.usrUsers_Id" => "2",
			"u.usrUsers_Status" => "1"
		),
		"orders" => array(
			"u.usrUsers_Id" => "DESC",
			"u.usrUsers_Date" => "ASC"
		)
	));
	echo $sql;
	*/
	public static function  createSelect($params) {
		
		$table   = isset($params['table']) ? $params['table'] : "";
		$fields  = isset($params['fields']) ? $params['fields'] : array();
		$joins   = isset($params['joins']) ? $params['joins'] : array();
		$where   = isset($params['where']) ? $params['where'] : array();
		$filters = isset($params['filters']) ? $params['filters'] : array();
		$start   = isset($params['start']) ? $params['start'] : null;
		$limit   = isset($params['limit']) ? $params['limit'] : null;
		$orders  = isset($params['orders']) ? $params['orders'] : array();
		$group  = isset($params['group']) ? $params['group'] : null;//aceptar la variable group no obligatoria
	
		$sql = "SELECT";
	
		//-------
	
		$str = "";
		
		foreach ($fields as $key) {
			$str .= ($str == "") ? "\n" : ",\n";
			$str .= "$key";
		}
	
		$sql .= "$str\n";
		
		//-------
	
		$sql .= "FROM $table";
	
		//-------
		
		$str = "";
	
		foreach ($joins as $key => $value) {
			$str .= "\n$key ON ($value)";
		}
		
		if ($str !== "") {
			$sql .= $str;
		}
	
		//-------
	
		$str = "";
	
		// Filtros obligatorios estructurales de consulta.
	
		foreach ($where as $key => $value) {
			
			// Buscar operator
			$parts = explode(" ", $key);
			if (count($parts) == 2) {
				$key = $parts[0];
				$operator = $parts[1];
			} else {
				$operator = "=";
			}
			
			if ($value !== null) {
				$str .= ($str == "") ? "\n" : " AND\n";
				$str .= "$key $operator '$value'";
			}
		}
	
		// Filtros opcionales de consulta.
		foreach ($filters as $values => $value) {

			$operator = "=";
			// revisar si son iguales
			$parts = explode(']', $values);
	
			if (count($parts) == 2) {
				$key = $parts[1];
			} else {
				$key = $values;
			}
			
			// Buscar operator
			$parts = explode(" ", $key);//dividor los datos
			
			if (count($parts) >= 2 ){ // verificar si almenos tiene un operador
				$operator = $parts[count($parts) -1];// el ultimo es el operador
				unset($parts[count($parts) -1]);//eliminar el ultimo
				$key = implode(" ", $parts);//unir el operador denuevo para que no se pierdan los datos
			}
			
			if ($value !== null) {
				$str .= ($str == "") ? "\n" : " AND\n";
				//$filters['key >='] =  "null";
				//$filters['key'] =  "@!STRING NOW()";
				//$filters['key >='] =  "@!STRING xxxXxxx_XXX";
				$parts = explode("@!STRING", $value);
				if (count($parts) == 2) {
					$value = $parts[1];
					$str .= "$key $operator $value";
				} else {
					$str .= "$key $operator '$value'";
				}
			}
		}
		
		if ($str !== "") {
			$sql .= "\nWHERE ($str\n)";
		}
		
		//-------
		
		if ($group !== null) {
			
			$sql.= "\nGROUP BY ". $group;
		}
		
		$str = "";
	
		foreach ($orders as $key => $value) {
			$str .= ($str == "") ? "" : ", ";
			$str .= "$key $value";
		}
	
		if ($str !== "") {
			$sql .= "\nORDER BY $str";
		}
	
		if ($start !== null && $limit !== null ) {
			$sql .= "\nLIMIT $start, $limit";
		}
		
		//-------

		return $sql;
	}
	
	// ------

	/*
	$sql = createInsert(array(
		"table" => "usrUsers",
		"fields" => array(
			'usrUsers_NameFirst' => 'Jhonn',
			'usrUsers_NameLast'  => 'Smith'
		)
	));
	echo $sql;
	*/
	public static function createInsert($params) {
		
		$table  = isset($params['table']) ? $params['table'] : "";
		$fields = isset($params['fields']) ? $params['fields'] : array();
		
		$sql = "INSERT INTO $table SET";
		
		//-------
		
		$str = "";
		
		foreach ($fields as $key => $value) {
				
			if ($value !== null) {

				$operator = "=";
				
				$str .= ($str == "") ? "\n" : ",\n";
	
				//$filters['key >='] =  "null";
				//$filters['key'] =  "@!STRING NOW()";
				//$filters['key >='] =  "@!STRING xxxXxxx_XXX";
				$parts = explode("@!STRING", $value);
				if (count($parts) == 2) {
					$value = $parts[1];
					$str .= "$key $operator $value";
				} else {
					$str .= "$key $operator '$value'";
				}
			}
		}
		
		$sql .= $str;
		
		//-------
		
		return $sql;
	}

	// ------

	/*
	$sql = createUpdate(array(
		"table" => "usrUsers",
		"fields" => array(
			'usrUsers_NameFirst' => 'Jhonn',
			'usrUsers_NameLast'  => 'Smith'
		),
		"where" => array(
			"usrUsers_Id" => "2",
			"usrUsers_Status" => "1"
		)
	));
	echo $sql;
	*/
	public static function createUpdate($params) {
		
		$table  = isset($params['table']) ? $params['table'] : "";
		$fields = isset($params['fields']) ? $params['fields'] : array();
		$where  = isset($params['where']) ? $params['where'] : array();
		
		$sql = "UPDATE $table SET";
		
		//-------
		
		$str = "";
		
		foreach ($fields as $key => $value) {
				
			if ($value !== null) {

				$operator = "=";
				
				$str .= ($str == "") ? "\n" : ",\n";
	
				//$filters['key >='] =  "null";
				//$filters['key'] =  "@!STRING NOW()";
				//$filters['key >='] =  "@!STRING xxxXxxx_XXX";
				$parts = explode("@!STRING", $value);
				if (count($parts) == 2) {
					$value = $parts[1];
					$str .= "$key $operator $value";
				} else {
					$str .= "$key $operator '$value'";
				}
			}
		}
		
		$sql .= $str;
		
		//-------
	
		$str = "";
	
		foreach ($where as $key => $value) {

			if ($value !== null) {

				$operator = "=";
				
				// Buscar operator
				$parts = explode(" ", $key);//dividor los datos
	
				if (count($parts) >= 2 ) {// verificar si almenos tiene un operador
					$operator = $parts[count($parts) -1];// el ultimo es el operador
					unset($parts[count($parts) -1]);//eliminar el ultimo
					$key = implode(" ", $parts);//unir el operador denuevo para que no se pierdan los datos
				}
				
				$str .= ($str == "") ? "\n" : " AND\n";
				
				//$filters['key >='] =  "null";
				//$filters['key'] =  "@!STRING NOW()";
				//$filters['key >='] =  "@!STRING xxxXxxx_XXX";
				$parts = explode("@!STRING", $value);
				if (count($parts) == 2) {
					$value = $parts[1];
					$str .= "$key $operator $value";
				} else {
					$str .= "$key $operator '$value'";
				}
			}
		}
		
		//-------
		
		$str = "";
		
		foreach ($where as $key => $value) {

			if ($value !== null) {
				
				$operator = "=";
				
				$parts = explode(" ", $key);
				if (count($parts) == 2) {
					$key = $parts[0];
					$operator = $parts[1];
				}
				
				$str .= ($str == "") ? "\n" : " AND\n";
	
				//$filters['key >='] =  "null";
				//$filters['key'] =  "@!STRING NOW()";
				//$filters['key >='] =  "@!STRING xxxXxxx_XXX";
				$parts = explode("@!STRING", $value);
				if (count($parts) == 2) {
					$value = $parts[1];
					$str .= "$key $operator $value";
				} else {
					$str .= "$key $operator '$value'";
				}
			}
		}
		
		if ($str == '') {
			echo "Alerta de actuallizacion no válida: " . $sql;
			exit();
		}
		
		//-------
		
		if ($str !== "") {
			$sql .= "\nWHERE ($str\n)";
		}
		
		//-------
		
		return $sql;
	}

	// ------
	
	/*
	$sql = createDelete(array(
		"table" => "usrUsers",
		"where" => array(
			"usrUsers_Id" => "2",
			"usrUsers_Status" => "1"
		)
	));
	echo $sql;
	*/
	public static function createDelete($params) {
		
		$table  = isset($params['table']) ? $params['table'] : "";
		$where  = isset($params['where']) ? $params['where'] : array();
		
		$sql = "DELETE FROM $table";
		
		//-------
		
		$str = "";
		
		foreach ($where as $key => $value) {

			if($value !== null) {

				$operator = "=";
				
				$parts = explode(" ", $key);
				if (count($parts) == 2) {
					$key = $parts[0];
					$operator = $parts[1];
				}
				
				$str .= ($str == "") ? "\n" : " AND\n";
				
				//$filters['key >='] =  "null";
				//$filters['key'] =  "@!STRING NOW()";
				//$filters['key >='] =  "@!STRING xxxXxxx_XXX";
				$parts = explode("@!STRING", $value);
				if (count($parts) == 2) {
					$value = $parts[1];
					$str .= "$key $operator $value";
				} else {
					$str .= "$key $operator '$value'";
				}
			}
		}
		
		if ($str !== "") {
			$sql .= "\nWHERE ($str\n)";
		}
		
		//-------
		
		if (count($where) == 0) {
			echo "Alerta de eliminación no válida: " . $sql;
			exit();
		}
		
		return $sql;
	}

}

?>