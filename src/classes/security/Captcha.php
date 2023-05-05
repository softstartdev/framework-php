<?php

/*
 * Crea un captcha, guarda el valor en session y devuelve la imagen en base64. 
*/

/*

// example

<img src='<?= STsecurityCaptchaGenerate() ?>' />
<input type='text' name='code' value='' />

-----

if (STsecurityCaptchaValidate($_POST['code'])){
	echo "El código es válido";
}

*/

// -------

namespace MxSoftstart\FrameworkPhp\classes\security;

class Captcha {

    public function __construct() {}

    public static function generate() {
		$_SESSION['_CAPTCHA_'] = $this->createCaptcha();
		return $_SESSION['_CAPTCHA_']['image'];
	}

    public static function validate($code) {
		return ($_SESSION['_CAPTCHA_']['code'] == $code) ? true : false;
	}

    private static function createCaptcha($config = array()) {

        // validate graphic library.
        if (!function_exists('gd_info')) {
            throw new Exception('Required GD library is missing');
        }
        
        // set paths.
        $bg_path     = dirname(__FILE__) . '/backgrounds/';
        $font_path   = dirname(__FILE__) . '/fonts/';
        $output_path = dirname(__FILE__) . '/output.png';
    
        // default config values.
        $captcha_config = array(
            'code'        => '',
            'min_length'  => 5,
            'max_length'  => 5,
            'backgrounds' => array(
                $bg_path . '45-degree-fabric.png',
                $bg_path . 'cloth-alike.png',
                $bg_path . 'grey-sandbag.png',
                $bg_path . 'kinda-jean.png',
                $bg_path . 'polyester-lite.png',
                $bg_path . 'stitched-wool.png',
                $bg_path . 'white-carbon.png',
                $bg_path . 'white-wave.png'
            ),
            'fonts' => array(
                $font_path . 'times_new_yorker.ttf'
            ),
            'characters'      => 'ABCDEFGHJKLMNPRSTUVWXYZabcdefghjkmnprstuvwxyz23456789',
            'min_font_size'   => 28,
            'max_font_size'   => 28,
            'color'           => '#666',
            'angle_min'       => 0,
            'angle_max'       => 10,
            'shadow'          => true,
            'shadow_color'    => '#fff',
            'shadow_offset_x' => -1,
            'shadow_offset_y' => 1,
            'output_path'     => $output_path
        );
    
        // overwrite defaults with custom config values.
        if (is_array($config)) {
            foreach($config as $key => $value) $captcha_config[$key] = $value;
        }
    
        // validate config
        if ($captcha_config['min_length'] < 1) $captcha_config['min_length'] = 1;
        if ($captcha_config['angle_min'] < 0) $captcha_config['angle_min'] = 0;
        if ($captcha_config['angle_max'] > 10) $captcha_config['angle_max'] = 10;
        if ($captcha_config['angle_max'] < $captcha_config['angle_min']) $captcha_config['angle_max'] = $captcha_config['angle_min'];
        if ($captcha_config['min_font_size'] < 10) $captcha_config['min_font_size'] = 10;
        if ($captcha_config['max_font_size'] < $captcha_config['min_font_size']) $captcha_config['max_font_size'] = $captcha_config['min_font_size'];
    
        // Use milliseconds instead of seconds.
        srand(microtime() * 100);
    
        // create captcha code if not set by user.
        if (empty($captcha_config['code'])) {
            $captcha_config['code'] = '';
            $length = rand($captcha_config['min_length'], $captcha_config['max_length']);
            while(strlen($captcha_config['code']) < $length){
                $captcha_config['code'] .= substr($captcha_config['characters'], rand() % (strlen($captcha_config['characters'])), 1);
            }
        }
    
        return array(
            'code'  => $captcha_config['code'],
            'image' => $this->createCaptchaImage($captcha_config)
        );
    }
    
    private static function createCaptchaImage($captcha_config) {

        // Use milliseconds instead of seconds.
        srand(microtime() * 100);

        // Pick random background, get info, and start captcha.
        $background = $captcha_config['backgrounds'][rand(0, count($captcha_config['backgrounds']) -1)];
        list($bg_width, $bg_height, $bg_type, $bg_attr) = getimagesize($background);

        $captcha = imagecreatefrompng($background);

        $color = hex2rgb($captcha_config['color']);
        $color = imagecolorallocate($captcha, $color['r'], $color['g'], $color['b']);

        // Determine text angle
        $angle = rand($captcha_config['angle_min'], $captcha_config['angle_max']) * (rand(0, 1) == 1 ? -1 : 1);

        // Select font randomly
        $font = $captcha_config['fonts'][rand(0, count($captcha_config['fonts']) - 1)];

        // Verify font file exists
        if (!file_exists($font)) throw new Exception('Font file not found: ' . $font);

        //Set the font size.
        $font_size = rand($captcha_config['min_font_size'], $captcha_config['max_font_size']);
        $text_box_size = imagettfbbox($font_size, $angle, $font, $captcha_config['code']);

        // Determine text position
        $box_width = abs($text_box_size[6] - $text_box_size[2]);
        $box_height = abs($text_box_size[5] - $text_box_size[1]);
        $text_pos_x_min = 0;
        $text_pos_x_max = ($bg_width) - ($box_width);
        $text_pos_x = rand($text_pos_x_min, $text_pos_x_max);
        $text_pos_y_min = $box_height;
        $text_pos_y_max = ($bg_height) - ($box_height / 2);
        $text_pos_y = rand($text_pos_y_min, $text_pos_y_max);

        // Draw shadow
        if ($captcha_config['shadow']) {
            $shadow_color = hex2rgb($captcha_config['shadow_color']);
            $shadow_color = imagecolorallocate($captcha, $shadow_color['r'], $shadow_color['g'], $shadow_color['b']);
            imagettftext($captcha, $font_size, $angle, $text_pos_x + $captcha_config['shadow_offset_x'], $text_pos_y + $captcha_config['shadow_offset_y'], $shadow_color, $font, $captcha_config['code']);
        }

        // Draw text
        imagettftext($captcha, $font_size, $angle, $text_pos_x, $text_pos_y, $color, $font, $captcha_config['code']);

        /*
        //salvar la imagen en archivo.
        imagepng($captcha, $captcha_config['output_path'], 9);
        */

        /*
        //volcar la imagen al navegador.
        header("Content-type: image/png");
        imagepng($captcha);
        */

        //regresar como base 64
        ob_start ();
        imagepng($captcha);
        $image_data = ob_get_contents();
        ob_end_clean();
        //echo "data:image/png;base64," . base64_encode($image_data);

        /*
        //regresar la ruta fisica en disco.
        echo $captcha_config['output_path'];
        */

        /*
        //regresar la url del recurso creado
        // no programado.
        */

        //free resources
        imagedestroy($captcha);

        return "data:image/png;base64," . base64_encode($image_data);
    }
    
}

// Si no existe la libreria php se intenta solventar con esta función.

if (!function_exists('hex2rgb')) {
    function hex2rgb($hex_str, $return_string = false, $separator = ','){
        $hex_str = preg_replace("/[^0-9A-Fa-f]/", '', $hex_str);
        $rgb_array = array();
        if(strlen($hex_str) == 6){
            $color_val = hexdec($hex_str);
            $rgb_array['r'] = 0xFF & ($color_val >> 0x10);
            $rgb_array['g'] = 0xFF & ($color_val >> 0x8);
            $rgb_array['b'] = 0xFF & $color_val;
        }else if(strlen($hex_str) == 3){
            $rgb_array['r'] = hexdec(str_repeat(substr($hex_str, 0, 1), 2));
            $rgb_array['g'] = hexdec(str_repeat(substr($hex_str, 1, 1), 2));
            $rgb_array['b'] = hexdec(str_repeat(substr($hex_str, 2, 1), 2));
        }else{
            return false;
        }
        return $return_string ? implode($separator, $rgb_array) : $rgb_array;
    }
}

?>