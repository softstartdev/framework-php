<?php

/*
 * Esta función encapsula el origen de las configuraciones de la aplicación
 * facilitando la migración entre origenes distintos.
 * Debe usarse para el resto de las cofiguraciones que no son del core.
 */

namespace MxSoftstart\FrameworkPhp\classes\format;

class Formater {

    public function __construct() {}

    /*
    * Da formato a moneda.
    */
    public static function dateTime1($datetime) {

        //Por lo pronto no es inteligente.
        
        //$var = '20/04/2012';
        $date = str_replace('/', '-', $datetime);
        return date('Y-m-d H:i:s', strtotime($date));
        
        /*
        // Verificar formato:
        // Si el formato no es de diagonales, volver diagonales.
        if(strpos($datetime, "-") == false) {
            $datetime = str_replace("/", "-", $datetime);
        }
        
        // Verificar orientación
        $parts = explode(" ", $datetime);
        $date
        
        //20-
        if(count($parts[0])==4){
    
        }
        //return "$ " . number_format($price, 2, '.', ',') . $code;
        */
    }

    public static function dateTime2($datetime) {
        return date('d/m/Y H:i:s', strtotime($datetime));
    }

    /*
    * Deprecated:
    * Corta un string agregando 3 puntos suspensivos.
    * Actualmente se puede hacer mediante CSS.
    */
    public static function string($string, $limit = 30) {
        if (strlen($string) > $limit) {
            return $string;
        } else {
            return $string;
        }
    }

    /*
    * Da formato a moneda.
    */
    public static function money($price, $decimals = 2, $code = "MXN") {
        
        return "$ " . number_format($price, $decimals, '.', ',') . $code;
    }

    public static function arrayToTable($array) {
		
		$html = '<table border="1">';
		
		$html .= '<tr>';
		foreach ($array[0] as $key => $value) {
			$html .= '<th>' . htmlspecialchars($key) . '</th>';
		}
		$html .= '</tr>';
		
		// -------
		
		foreach ($array as $key => $value) {
			$html .= '<tr>';
			foreach ($value as $key2 => $value2) {
				$html .= '<td>' . htmlspecialchars(substr($value2, 0, 50)) . '</td>';
			}
			$html .= '</tr>';
		}
		
		$html .= '</table>';
		
		return $html;
	}
    
    public static function boolean($value, $true = true, $false = false) {

        if ($value == 0) {
            return $false;
        }
        
        if ($value == "0") {
            return $false;
        }
        
        if ($value == "false") {
            return $false;
        }
        
        if ($value == "FALSE") {
            return $false;
        }

        if ($value == false) {
            return $false;
        }
        
        if ($value == FALSE) {
            return $false;
        }

        if ($value == "") {
            return $false;
        }
        
        return $true;
    }

}

// ------

//require_once dirname(__FILE__) . '/classes/Thumbnail.class.php';

/*
 * Redimensiona una imagen en la cache y devuelve la imagen en base64.
 */

/*
if (!function_exists("STformatImage")) {
    function STformatImage($paths, $image, $size, $use_cache = true) {
        
        //obtener el nombre de la imagen y su ruta a redimensionar
        if ($image == "") {
            $image = "EMPTY.png";
            $pathImage = getPathViews() . "/" . getTemplate() . "/img/" . $image;
        } else {
            if (is_file($path . "/" . $image)) {
                $image = $image;
                $pathImage = $path . "/" . $image;
            } else {
                $image = "EMPTY.png";
                $pathImage = getPathViews() . "/" . getTemplate() . "/img/" . $image;
            }
        }
        
        //obtener nombre y extension del archivo
        $parts = explode(".", basename($pathImage));
        $name  = $parts[0];
        $ext   = $parts[1];
        
        //dimensiones de la imagen
        $dimentions = explode("x", $size);
        
        //obtener ruta de thumbnail
        //NOTA: obsoleto
        //$pathThumbnail = $pathCache."/".$size."_".$image;
        $pathThumbnail = getPathCache() . "/tmp." . $ext;
        
        //redimensionar
        if (!is_file($pathThumbnail)) {
            $thumbnail = new Thumbnail($pathImage, $pathThumbnail);
            $thumbnail->create($dimentions[0], $dimentions[1]);
        } else {
            if ($use_cache == false) {
                $thumbnail = new Thumbnail($pathImage, $pathThumbnail);
                $thumbnail->create($dimentions[0], $dimentions[1]);
            }
        }
        
        //agregar permisos al archivo
        chmod($pathThumbnail, 0777);
        
        //renombrar
        $pathRenamed = getPathCache() . "/" . md5_file($pathThumbnail) . "." . $ext;
        rename($pathThumbnail, $pathRenamed);
        
        //NOTA: obsoleto
        //return $pathThumbnail;
        return $pathRenamed;
    }
}
*/

/*
 * Funcion personalizada para codificar variables a json.
 */
/*
if (!function_exists("STformatJson")) {
    function STformatJson($data){
        switch(gettype($data)){

            //boolenos
            case 'boolean':
                return $data ? 'true' : 'false';

            //enteros
            case 'integer':
                return $data;

            //dobles
            case 'double':
                return $data;

            //recursos
            case 'resource':
                //no soportado

            //cadenas
            case 'string':
                $json = '';
                //escapar caracteres no imprimibles o no ascii
                $string = '"' . addcslashes($data, "\\\"\n\r\t/" . chr(8) . chr(12)) . '"';
                for ($i = 0; $i < strlen($string); $i++) {
                    $char = $string[$i];
                    $c1 = ord($char);

                    # Single byte;
                    if($c1 < 128){
                        $json .= ($c1 > 31) ? $char : sprintf("\\u%04x", $c1);
                        continue;
                    }

                    # Double byte
                    $c2 = ord($string[++$i]);
                    if(($c1 & 32) === 0){
                        $json .= sprintf("\\u%04x", ($c1 - 192) * 64 + $c2 - 128);
                        continue;
                    }

                    # Triple
                    $c3 = ord($string[++$i]);
                    if (($c1 & 16) === 0){
                        $json .= sprintf("\\u%04x", (($c1 - 224) <<12) + (($c2 - 128) << 6) + ($c3 - 128));
                        continue;
                    }

                    # Quadruple
                    $c4 = ord($string[++$i]);
                    if (($c1 & 8 ) === 0){
                        $u = (($c1 & 15) << 2) + (($c2 >> 4) & 3) - 1;
                        $w1 = (54 << 10) + ($u << 6) + (($c2 & 15) << 2) + (($c3 >> 4) & 3);
                        $w2 = (55 << 10) + (($c3 & 15) << 6) + ($c4 - 128);
                        $json .= sprintf("\\u%04x\\u%04x", $w1, $w2);
                    }

                }
                return $json;

            //arrays
            case 'array':

                //indexados
                if (empty($data) || array_keys($data) === range(0, sizeof($data) - 1)){
                    $output = array();
                    foreach ($data as $value) {
                        $output[] = toJson($value);
                    }
                    return '[' . implode(',', $output) . ']';

                //asosiativos (en javascript los arrays asociativos son en realidad bojetos)
                }else{
                    $output = array();
                    foreach ($data as $key => $value) {
                        $output[] = toJson($key) . ':' . toJson($value);
                    }
                    return '{' . implode(',', $output) . '}';
                }

            //objetos
            case 'object':
                $output = array();
                foreach ($data as $key => $value) {
                    $output[] = toJson(strval($key)).':'.toJson($value);
                }
                return '{' . implode(',', $output) . '}';

            //null
            default:
                return 'null';

        }
    }
}
*/

/*
if (!function_exists("STformatBoolean")) {
    function STformatBoolean($value) {

        $formatBoolean = getParameter("formatBoolean", "GET", 'false');
        
        if ($formatBoolean == "zero") {
            return ($value == 1) ? 1 : 0;
        }
        
        if ($formatBoolean == "zero_string") {
            return ($value == 1) ? "1" : "0";
        }
        
        if ($formatBoolean == "false") {
            return ($value == 1) ? true : false;
        }
        
        if ($formatBoolean == "false_string") {
            return ($value == 1) ? "true" : "false";
        }
        
        if ($formatBoolean == "empty") {
            return ($value == 1) ? "1" : "";
        }
    }
}
*/

/*
 * Esta funcion no se donde se usa. 
 */

/*
function getBoolean($key, $type, $val) {
	
	$data = getParameter($key, $type, $val);

	if ($data != "false") {
		return "function=1";
	} else {
		return "function=0";
	}
}
*/

?>