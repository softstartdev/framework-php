<?php

namespace MxSoftstart\FrameworkPhp\classes\images;

class Thumbnail {

    protected $pathImage;
    protected $pathThumbnail;

    protected $image;
    protected $width;
    protected $height;
    protected $mime;
    protected $bits;

    public function __construct($pathImage, $pathThumbnail) {

        if (is_file($pathImage)) {
            $this->pathImage     = $pathImage;
            $this->pathThumbnail = $pathThumbnail;

            $info = getimagesize($this->pathImage);
            $this->width  = $info[0];
            $this->height = $info[1];
            $this->mime   = $info['mime'];
            $this->bits   = $info['bits'];

            if ($this->mime == 'image/gif') {
                $this->image = imagecreatefromgif($this->pathImage);
            } else if ($this->mime == 'image/png') {
                $this->image = imagecreatefrompng($this->pathImage);
            } else if ($this->mime == 'image/jpeg') {
                $this->image = imagecreatefromjpeg($this->pathImage);
            }
        }
    }

    public function create($width = 75, $height = 75, $replace = false) {

        //si no existe el archivo origen
        if (!file_exists($this->pathImage)) {
        	//echo "no existe la imagen de origen";
            return false;
        }
        
        //si ya existe no se sobreescribe
        //a menos que se pida explicitamente.
        if (file_exists($this->pathThumbnail)) {
            if ($replace == false) {
                return true;
            }
        }

        //nuevo tamaño de la imagen original reducida dentro de la miniatura
        $newWidth;
        $newHeight;

        if ($this->height <= $height) {                         //si el alto esta bien?
            $newHeight = $this->height;                         //es el alto bueno

            if ($this->width <= $width) {                       //si el ancho esta bien?
                $newWidth = $this->width;                       //es el ancho bueno
            } else {
                $rel = $width/$this->width;                     //calculo la relacion de anchos
                $newWidth = $this->width*$rel;                  //reduzco el ancho (afecta al alto)
                $newHeight = $newHeight*$rel;                   //escalo el alto
            }
        } else {
            $rel = $height/$this->height;                       //calculo la relacion de altos
            $newHeight = $this->height*$rel;                    //reduzco el ancho (afecta al ancho)
            $newWidth = $this->width*$rel;                      //escalo el alto

            if ($newWidth <= $width) {                          //si el ancho esta bien?
                $newWidth = $newWidth;                          //es el ancho bueno (no cambia)
            } else {
                $rel = $width/$newWidth;                        //calculo la relacion
                $newWidth = $newWidth*$rel;                     //reduzco el ancho (afecta al alto)
                $newHeight = $newHeight*$rel;                   //escalo el alto
            }
        }

        //centrar imagen en imagenMiniatura
        $x = floor(($width-$newWidth) / 2);
        $y = floor(($height-$newHeight) / 2);
        $newImage = imagecreatetruecolor($width, $height);
        
        if ($this->mime == 'image/png') {
            //color de fondo transparente.
            imagesavealpha($newImage, true);
            imagefill($newImage, 0, 0, imagecolorallocatealpha($newImage, 0, 0, 0, 127));
        } else {
            //color de fondo de la miniatura
            $white = imagecolorallocate($newImage, 255, 255, 255);
            imagefilledrectangle($newImage, 0, 0, $width, $height, $white);
        }
        
        //imagecopyresized
        imagecopyresampled($newImage, $this->image, $x, $y, 0, 0, $newWidth, $newHeight, $this->width, $this->height);

        //guardar la imagen con la maxima calidad
        if ($this->mime == 'image/gif') {
            imagegif($newImage, $this->pathThumbnail);
        } else if ($this->mime == 'image/png') {
            imagepng($newImage, $this->pathThumbnail, 0);
        } else if ($this->mime == 'image/jpeg') {
            imagejpeg($newImage, $this->pathThumbnail, 100);
        }

        //liberar memoria
        imagedestroy($newImage);
        imagedestroy($this->image);
        
        return true;
    }
    
}
?>