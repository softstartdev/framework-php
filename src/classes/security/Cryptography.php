<?php

/**
 * Sirve para encriptar y desencriptar datos.
 * Depende de la libreria mcrypt.
 */

//----------

/*
echo STsecurityEncrypt("Hola mundo!", "qwerty123*");
echo "<br/>";
echo STsecurityDecrypt("P9VMFlww4vg8MK7Bu8UJnxYJNXJVV0AnVYue3XtPyzU=", "qwerty123*");
*/

namespace MxSoftstart\FrameworkPhp\classes\security;

class Cryptography {

    public function __construct() {}

    public static function encrypt($value, $secret) {
        return rtrim(
            base64_encode(
                mcrypt_encrypt(
                    MCRYPT_RIJNDAEL_256,
                    $secret, $value, 
                    MCRYPT_MODE_ECB, 
                    mcrypt_create_iv(
                        mcrypt_get_iv_size(
                            MCRYPT_RIJNDAEL_256, 
                            MCRYPT_MODE_ECB
                        ), 
                        MCRYPT_RAND)
                    )
                ), "\0"
            );
    }

    public static function decrypt($value, $secret) {
        return rtrim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_256, 
                $secret, 
                base64_decode($value), 
                MCRYPT_MODE_ECB,
                mcrypt_create_iv(
                    mcrypt_get_iv_size(
                        MCRYPT_RIJNDAEL_256,
                        MCRYPT_MODE_ECB
                    ), 
                    MCRYPT_RAND
                )
            ), "\0"
        );
    }
    
}

?>