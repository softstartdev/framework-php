<?php

namespace MxSoftstart\FrameworkPhp\classes\databases\LQL;

use MxSoftstart\FrameworkPhp\classes\time\Date;
use MxSoftstart\FrameworkPhp\classes\databases\SQL\Generator as SQLGenerator;

class Decoder {
    
    public function __construct() { }

    // -------

    // OK
    public static function createSelect($queryDecoded) {

        $main = Decoder::getMain($queryDecoded);

        // ------

        $tmpFields = $queryDecoded['fields'];// se toma los valores de queryDecoded.

        // decodificar los campos y obtener informacion.

        $fields     = array();
        $tables     = array();
        $relations  = array();

        foreach ($tmpFields as $code) {

            $code = trim($code);            // limpiar espacios vacios en el código.
            
            if ($code == "") continue;      // omitir códigos vacios.
            
            $code  = substr($code, 0, -1);   // eliminar ultimo caracter ];
            $parts = explode("[", $code);
            $path  = $parts[0];

            //echo "-" . $path . "-";
            $paths = explode(".", $path);
            $keys  = explode(",", $parts[1]);

            foreach ($keys as $key) {
                
                if ($path == "") {
                    $tablename = $main;
                } else {
                    // la ultima nombre de tabla es la que en realidad cuenta.
                    $tablename = trim($paths[count($paths) - 1]);
                }

                // buscar el sujifo o crearlo y guardarlo.
                if (in_array($tablename, array_keys($tables)) == false) {

                    // generar 3 letras aleatorias desde la letra b.
                    $l1 = chr(rand(ord('a'), ord('z')));
                    $l2 = chr(rand(ord('a'), ord('z')));
                    $l3 = chr(rand(ord('a'), ord('z')));
                    $l4 = chr(rand(ord('a'), ord('z')));
                    $sufix = $l1 . $l2 . $l3 . $l4;
                    
                    $tables[$tablename] = $sufix;
                } else {
                    $sufix = $tables[$tablename];
                }

                // solo importa el nombre de la ultima tabla.
                $fields[] =  $sufix . "." . $tablename . "_" . ucfirst(trim($key));
            }

            // identificar las relaciones.
            
            if ($path !== "") {
                if (count($paths) == 1) {
                    $relation = $main . "-" . $paths[0];
                    if (in_array($relation, $relations) == false) {
                        $relations[] = $relation;
                    }
                }
                
                if (count($paths) > 1) {
                    $relation = $paths[count($paths) - 2] . "-" . $paths[count($paths) - 1];
                    if (in_array($relation, $relations) == false) {
                        $relations[] = $relation;
                    }
                }
            }
        }

        // ------
        
        $joins = array();
        foreach ($relations as $relation) {
            $parts  = explode("-", $relation);
            $first  = $parts[0];
            $second = $parts[1];
            // LEFT JOIN petitions pets ON ( pets.petitions_Id = xxx.petitions_Id)
            $joins["LEFT JOIN " . $second . " " . $tables[$second]] = $tables[$second] . "." . $second . "_Id = " . $tables[$first] . "." . $second . "_Id";
        }

        /*
        d($main);
        d($fields);
        d($relations);
        d($tables);
        d($joins);
        exit();
        */

        // ------

        $newTable = $main . " " . $tables[$main];
        
        // ------

        $newFields = $fields;

        // ------

        $tmpFilters = Decoder::getFilters($queryDecoded);

        //d($tmpFilters);

        $newWhere = array();
        foreach ($tmpFilters as $code => $value) {

            //echo $code;

            $parts = explode(" ", $code);
            $parts2 = explode("_", $parts[0]);

            // value ------
            
            $newValue = $value;

            // Formateado de fechas para la base de datos.
            $myDate = new Date($newValue);
            if ($myDate->isDate()) {
                $newValue = $myDate->getFormated("YYYY-mm-dd hh:mm:ss");
            }

            // operator ------

            $operator = trim($parts[1]);

            // key -------

            $key = trim($parts2[1]);

            //path -------

            $path  = trim($parts2[0]);
            $paths = explode(".", $path);

            if (count($paths) == 1) {
                //$tablename = $main;
                $tablename = $paths[0];
            }

            //print_r($paths);
            if (count($paths) > 1) {
                $tablename = trim(array_pop($paths));
            }
            
            $newWhere[$tables[$tablename] . "." . $tablename . "_" . $key . " " . $operator] = $newValue;
        }

        //d($newWhere);

        // ------

        //$tmpOrders = explode("\n", $params['orders']);
        $tmpOrders = Decoder::getOrders($queryDecoded);

        $newOrders = array();
        foreach ($tmpOrders as $code => $value) {
            
            //echo $code;
            
            $parts = explode("_", $code);

            // value ------

            $newValue = $value;

            // Formateado de fechas para la base de datos.
            $myDate = new Date($newValue);
            if ($myDate->isDate()) {
                $newValue = $myDate->getFormated("YYYY-mm-dd hh:mm:ss");
            }

            // key -------
            
            $key = trim($parts[1]);

            //path -------

            $paths = explode(".", $parts[0]);

            if (count($paths) == 1) {
                //$tablename = $main;
                $tablename = $paths[0];
            }
            
            if (count($paths) > 1) {
                $tablename = trim(array_pop($paths));
            }
            
            $newOrders[$tables[$tablename] . "." . $tablename . "_" . $key] = $newValue;
        }
        
        // ------
        
        $sql = SQLGenerator::createSelect(array(
            "table"  => $newTable,
            "joins"  => $joins,
            "fields" => $newFields,
            "where"  => $newWhere,
            "start"  => Decoder::getStart($queryDecoded),
            "limit"  => Decoder::getLimit($queryDecoded),
            "orders" => $newOrders
        ));

        return $sql;
    }

    /*
    public function createSelect($params) {

        //$tmpFields = explode("\n", $params['fields']);
        $tmpFields = $params['fields'];

        // ------

        // decodificar los campos y obtener informacion.

        $fields     = array();
        $tables     = array();
        $relations  = array();
        $main       = "";

        foreach ($tmpFields as $code) {

            $code = trim($code);            // limpiar espacios vacios en el código.
            
            if ($code == "") continue;      // omitir códigos vacios.
            
            $code  = substr($code, 0, -1);   // eliminar ultimo caracter ];
            $parts = explode("[", $code);
            $path  = $parts[0];
            $paths = explode(".", $path);
            $keys  = explode(",", $parts[1]);
            
            foreach ($keys as $key) {
                
                // la ultima nombre de tabla es la que en realidad cuenta.
                $tablename = $paths[count($paths)-1];

                // generar un sufijo para la tabla y guardarlo.
                if (in_array($tablename, array_keys($tables)) == false) {

                    // generar 3 letras aleatorias desde la letra b.
                    $l1 = chr(rand(ord('a'), ord('z')));
                    $l2 = chr(rand(ord('a'), ord('z')));
                    $l3 = chr(rand(ord('a'), ord('z')));
                    $l4 = chr(rand(ord('a'), ord('z')));
                    $sufix = $l1.$l2.$l3.$l4;
                    
                    $tables[$tablename] = $sufix;

                } else {
                    $sufix = $tables[$tablename];
                }

                // solo importa el nombre de la ultima tabla.
                $fields[] =  $sufix . "." . $tablename . "_" . ucfirst(trim($key));
            }

            // identificar la tabla principal.
            
            if ($main == "" && count($paths) == 1) $main = $paths[0];

            // identificar las relaciones.

            if (count($paths) > 1) {
                $relation = $paths[count($paths)-2] . "-" . $paths[count($paths)-1];
                if (in_array($relation, $relations) == false) {
                    $relations[] = $relation;
                }
            }
        }

        // ------
        
        $joins = array();
        foreach ($relations as $relation) {
            $parts = explode("-", $relation);
            $first = $parts[0];
            $second = $parts[1];
            // LEFT JOIN petitions pets ON ( pets.petitions_Id = xxx.petitions_Id)
            $joins["LEFT JOIN " . $second . " " . $tables[$second]] = $tables[$second] . "." . $second . "_Id = " . $tables[$first] . "." . $second . "_Id";
        }

        // ------

        $newTable = $main . " " . $tables[$main];
        
        // ------

        $newFields = $fields;

        // ------

        //$tmpFilters = explode("\n", $params['filters']);
        $tmpFilters = $params['filters'];

        //d($tmpFilters);

        $newWhere = array();
        foreach ($tmpFilters as $code) {

            $code = trim($code);
            
            if ($code == "") continue;
            
            if (strpos($code, "=") !== false) $operator = " = ";
            if (strpos($code, "<") !== false) $operator = " < ";
            if (strpos($code, ">") !== false) $operator = " > ";
            if (strpos($code, "<=") !== false) $operator = " <= ";
            if (strpos($code, ">=") !== false) $operator = " >= ";
            if (strpos($code, "LIKE") !== false) $operator = " LIKE ";
            if (strpos($code, "like") !== false) $operator = " like ";

            $parts = explode($operator, $code);

            //d($parts);
            $paths = explode(".", trim($parts[0]));
            //d($paths);

            $key       = array_pop($paths);
            //d($key);
            $tablename = array_pop($paths);
            //d($tablename);
            $value     = trim($parts[1]);
            //d($value);
            //d($tables);

            // Formateado de fechas para la base de datos.
            $myDate = new Date($value);
            if ($myDate->isDate()) {
                $value = $myDate->getFormated("YYYY-mm-dd hh:mm:ss");
            }

            $newWhere[$tables[$tablename] . "." . $tablename . "_" . $key . " " . trim($operator)] = $value;
        }

        //d($newWhere);

        // ------

        //$tmpOrders = explode("\n", $params['orders']);
        $tmpOrders = $params['orders'];

        $newOrders = array();
        foreach ($tmpOrders as $code) {

            $code = trim($code);
            
            if ($code == "") continue;
            
            // identificar el operador

            $parts = explode(" ", $code);
            $paths = explode(".", trim($parts[0]));

            $key       = array_pop($paths);
            $tablename = array_pop($paths);
            $value     = trim($parts[1]);
            
            // Formateado de fechas para la base de datos.
            $myDate = new Date($value);
            if ($myDate->isDate()) {
                $value = $myDate->getFormated("YYYY-mm-dd hh:mm:ss");
            }
            
            $newOrders[$tables[$tablename] . "." . $tablename . "_" . $key] = $value;
        }
        
        // ------

        $sql = SQLGenerator::createSelect(array(
            "table"  => $newTable,
            "joins"  => $joins,
            "fields" => $newFields,
            "where"  => $newWhere,
            "start"  => $params['start'],
            "limit"  => $params['limit'],
            "orders" => $newOrders
        ));

        return $sql;
    }
    */
    
    //OK
    public static function createInsert($queryDecoded) {

        $main    = Decoder::getMain($queryDecoded);
        $fields  = Decoder::getFields($queryDecoded);

        // Formateado de fechas para la base de datos.
        $keys = array_keys($fields);
        foreach($keys as $key) {
            $myDate = new Date($fields[$key]);
            if ($myDate->isDate()) {
                $fields[$key] = $myDate->getFormated("YYYY-mm-dd hh:mm:ss");
            }
        }

        //d($main);
        //d($fields);

        $sql = SQLGenerator::createInsert(array(
            "table" => $main,
            "fields" => $fields
        ));

        return $sql;
    }

    //OK
    public static function createUpdate($queryDecoded) {

        $main    = Decoder::getMain($queryDecoded);
        $fields  = Decoder::getFields($queryDecoded);
        $filters = Decoder::getFilters($queryDecoded);

        // Formateado de fechas para la base de datos.
        $keys = array_keys($fields);
        foreach($keys as $key) {
            $myDate = new Date($fields[$key]);
            if ($myDate->isDate()) {
                $fields[$key] = $myDate->getFormated("YYYY-mm-dd hh:mm:ss");
            }
        }

        // Formateado de fechas para la base de datos.
        $keys = array_keys($filters);
        foreach($keys as $key) {
            $myDate = new Date($filters[$key]);
            if ($myDate->isDate()) {
                $filters[$key] = $myDate->getFormated("YYYY-mm-dd hh:mm:ss");
            }
        }

        //d($main);
        //d($fields);
        //d($filters);

        $sql = SQLGenerator::createUpdate(array(
            "table"  => $main,
            "fields" => $fields,
            "where"  => $filters
        ));

        return $sql;
    }
    
    //OK
    public static function createDelete($queryDecoded) {

        $main    = Decoder::getMain($queryDecoded);
        $filters = Decoder::getFilters($queryDecoded);

        // Formateado de fechas para la base de datos.
        $keys = array_keys($filters);
        foreach($keys as $key) {
            $myDate = new Date($filters[$key]);
            if ($myDate->isDate()) {
                $filters[$key] = $myDate->getFormated("YYYY-mm-dd hh:mm:ss");
            }
        }

        $sql = SQLGenerator::createDelete(array(
                "table" => $main,
                "where" => $filters
            )
        );
        
        return $sql;
    }

    // -------

    //OK
    public static function decodeQuery($query) {

        // Nota: En esta version los campos deben ser consecutivos.

        // --------

        /*
        MAIN: providers
        FIELDS:
        [Id, Name]
        peoples[Id, Firstname, Lastname]
        [Location]
        FILTERS:
        Id >= 500
        Id < 550
        peoples.Firstname LIKE %a%
        ORDERS:
        peoples.Id DESC
        START: 11
        LIMIT: 5
        */

        // --------

        $rows = explode("\n", $query);
        
        //d($rows);

        // --------

        // limpieza de variables.

        $tmp = array();
        foreach ($rows as $row) {
            
            $row = trim($row);
            
            $allow = true;

            // Eliminar vacios y comentarios // y --
            if ($row == "") {
                $allow = false;
            } else {
                
                if (mb_strpos($row, '//') === false) {} else { $allow = false; }
                if (mb_strpos($row, '--') === false ) {} else { $allow = false; }
            }

            if ($allow == true) $tmp[] = $row;
        }

        $rows = $tmp;

        //d($rows);

        // --------
        
        // calculo de posiciones de inicio.

        $mainStart    = null;
        $fieldsStart  = null;
        $filtersStart = null;
        $ordersStart  = null;
        $start        = null;
        $limit        = null;

        for ($i=0; $i < count($rows); $i++) {
            if (strpos($rows[$i], "MAIN:")    !== false) $mainStart = $i;
            if (strpos($rows[$i], "FIELDS:")  !== false) $fieldsStart = $i + 1;
            if (strpos($rows[$i], "FILTERS:") !== false) $filtersStart = $i + 1;
            if (strpos($rows[$i], "ORDERS:")  !== false) $ordersStart = $i + 1;
            if (strpos($rows[$i], "START:")   !== false) $start = $i;
            if (strpos($rows[$i], "LIMIT:")   !== false) $limit = $i;
        }

        // --------

        // calculo de posiciones finales.

        // fieldsEnd
        if ($fieldsStart !== null) {
            $fieldsEnd = count($rows) - 1;
            for($i=0; $i < count($rows); $i++) {
                if (strpos($rows[$i], "FILTERS:") !== false) {
                    $fieldsEnd = $i - 1;
                    break;
                } else {
                    if (strpos($rows[$i], "ORDERS:") !== false) {
                        $fieldsEnd = $i - 1;
                        break;
                    } else {
                        if (strpos($rows[$i], "START:") !== false) {
                            $fieldsEnd = $i - 1;
                            break;
                        } else {
                            if (strpos($rows[$i], "LIMIT:") !== false) {
                                $fieldsEnd = $i - 1;
                                break;
                            } else {
                                // Dejar el valor por defecto.
                            }
                        }
                    }
                }
            }
        }

        // filtersEnd
        if ($filtersStart !== null) {
            $filtersEnd = count($rows) - 1;
            for($i=0; $i < count($rows); $i++) {
                if (strpos($rows[$i], "ORDERS:") !== false) {
                    $filtersEnd = $i - 1;
                    break;
                } else {
                    if (strpos($rows[$i], "START:") !== false) {
                        $filtersEnd = $i - 1;
                        break;
                    } else {
                        if (strpos($rows[$i], "LIMIT:") !== false) {
                            $filtersEnd = $i - 1;
                            break;
                        } else {
                            // Dejar el valor por defecto.
                        }
                    }
                }
            }
        }

        // ordersEnd
        if ($ordersStart !== null) {
            $ordersEnd = count($rows) - 1;
            for($i=0; $i < count($rows); $i++) {
                if (strpos($rows[$i], "START:") !== false) {
                    $ordersEnd = $i - 1;
                    break;
                } else {
                    if (strpos($rows[$i], "LIMIT:") !== false) {
                        $ordersEnd = $i - 1;
                        break;
                    } else {
                        // Dejar el valor por defecto.
                    }
                }
            }
        }

        /*
        echo "mainStart: "  . $mainStart . "\n";
        echo "fieldsStart: "  . $fieldsStart . "\n";
        echo "filtersStart: " . $filtersStart . "\n";
        echo "ordersStart: "  . $ordersStart . "\n";
        echo "start: "  . $start . "\n";
        echo "limit: "  . $limit . "\n";
        
        echo "fieldsEnd: "  . $fieldsEnd . "\n";
        echo "filtersEnd: "  . $filtersEnd . "\n";
        echo "ordersEnd: "  . $ordersEnd . "\n";
        */
        
        // --------

        // extraccion de datos o subsanacion.
        
        if ($mainStart !== null) {
            $main = array_slice($rows, $mainStart, 1);
            $main = $main[0];
            //$parts = explode(":", $main[0]);
            //$main = trim($parts[1]);
        } else {
            exit("el campo MAIN: es obligatorio.");
        }

        if ($fieldsStart !== null) {
            $diff = $fieldsEnd - $fieldsStart;
            $fields  = array_slice($rows, $fieldsStart,  $diff + 1);
        } else {
            $fields = array();
        }
        
        if ($filtersStart !== null) {
            $diff = $filtersEnd - $filtersStart;
            $filters = array_slice($rows, $filtersStart, $diff + 1);
        } else {
            $filters = array();
        }
        
        if ($ordersStart !== null) {
            $diff = $ordersEnd - $ordersStart;
            $orders  = array_slice($rows, $ordersStart, $diff + 1);
        } else {
            $orders = array();
        }
        
        if ($start !== null) {
            $start = array_slice($rows, $start, 1);
            $start = $start[0];
            //$parts = explode(":", $start[0]);
            //$start = trim($parts[1]);
        } else {
            $start = null;
        }
        
        if ($limit !== null) {
            $limit = array_slice($rows, $limit, 1);
            $limit = $limit[0];
            //$parts = explode(":", $limit[0]);
            //$limit = trim($parts[1]);
        } else {
            $limit = null;
        }

        //d($fields);
        //d($filters);
        //d($orders);

        // --------

        // formacion de la respuesta.

        return array(
            "main"    => $main,
            "fields"  => $fields,
            "filters" => $filters,
            "orders"  => $orders,
            "start"   => $start,
            "limit"   => $limit
        );
    }

    // -------

    //OK
    private static function getMain($decodedQuery) {
        //d($decodedQuery);
        //echo "-".$decodedQuery['main']."-";
        $main = $decodedQuery['main'];
        $main = trim($main);
        $parts = explode(":", $main);

        return trim($parts[1]);
    }

    //OK
    // Esta funcion no sirve para get solo para insert y update.
    public static function getFields($decodedQuery) {

        $main = Decoder::getMain($decodedQuery);

        // decodificar los campos y obtener informacion.

        $list = array();

        foreach ($decodedQuery['fields'] as $code) {

            $code = trim($code);
            
            $parts = explode("=", $code);
            
            $field = trim($parts[0]);
            $value = trim($parts[1]);

            $list[$field] = $value;
            
            /*
            $code = trim($code);            // limpiar espacios vacios en el código.
            
            if ($code == "") continue;      // omitir códigos vacios.
            
            $parts = explode(" = ", $code);
            $paths = explode(".", trim($parts[0]));
            //print_r($parts);
            //print_r($paths);
            if (count($paths) == 1) {
                $key       = trim($parts[0]);
                $tablename = $main;
            }

            if (count($paths) > 1) {
                $key       = trim(array_pop($paths));
                $tablename = trim(array_pop($paths));

                //fix:
                $key = trim(str_replace("=", "", $key));
            }

            $value = trim($parts[1]);

            $list[$tablename . "_" . ucfirst($key)] = $value;
            */
        }

        return $list;
    }

    //OK
    public static function getFilters($decodedQuery) {

        $main = Decoder::getMain($decodedQuery);

        // decodificar los campos y obtener informacion.

        $list = array();

        foreach ($decodedQuery['filters'] as $code) {

            $code = trim($code);            // limpiar espacios vacios en el código.
            
            if ($code == "") continue;      // omitir códigos vacios.
            
            // encontrar el operador.

            if (strpos($code, "=") !== false) $operator = " = ";
            if (strpos($code, "<") !== false) $operator = " < ";
            if (strpos($code, ">") !== false) $operator = " > ";
            if (strpos($code, "<=") !== false) $operator = " <= ";
            if (strpos($code, ">=") !== false) $operator = " >= ";
            if (strpos($code, "LIKE") !== false) $operator = " LIKE ";
            if (strpos($code, "like") !== false) $operator = " like ";

            $operator = trim($operator);
            //echo $operator;

            $parts = explode("$operator", $code);
            //print_r($parts);
            $paths = explode(".", trim($parts[0]));
            //print_r($paths);

            if (count($paths) == 1) {
                $key       = trim($parts[0]);
                $tablename = $main;
            }

            if (count($paths) > 1) {
                $key       = trim(array_pop($paths));
                $tablename = trim(array_pop($paths));

                //fix: eliminar el operador de la key.
                $key = trim(str_replace($operator, "", $key));
            }

            //echo $key;

            $value = trim($parts[1]);
            
            $list[$tablename . "_" . ucfirst($key) . " " . $operator] = $value;
        }

        return $list;
    }

    //OK
    public static function getOrders($decodedQuery) {

        $main = Decoder::getMain($decodedQuery);

        // decodificar los campos y obtener informacion.

        $list = array();

        foreach ($decodedQuery['orders'] as $code) {

            $code = trim($code);            // limpiar espacios vacios en el código.
            
            if ($code == "") continue;      // omitir códigos vacios.
            
            $parts = explode(" ", $code);
            $paths = explode(".", trim($parts[0]));

            if (count($paths) == 1) {
                $key       = trim($parts[0]);
                $tablename = $main;
            }

            if (count($paths) > 1) {
                $key       = trim(array_pop($paths));
                $tablename = trim(array_pop($paths));

                //fix:
                $key = trim(str_replace("=", "", $key));
            }

            $value = trim($parts[1]);

            $list[$tablename . "_" . ucfirst($key)] = $value;
        }

        return $list;
    }

    //OK
    public static function getStart($decodedQuery) {
        if ($decodedQuery['start'] == null) {
            return null;
        } else {
            $start = trim($decodedQuery['start']);
            $parts = explode(":", $start);
            return trim($parts[1]);
        }
    }

    //OK
    public static function getLimit($decodedQuery) {

        if ($decodedQuery['limit'] == null) {
            return null;
        } else {
            $limit = trim($decodedQuery['limit']);
            $parts = explode(":", $limit);
            return trim($parts[1]);
        }
    }
    
}

?>