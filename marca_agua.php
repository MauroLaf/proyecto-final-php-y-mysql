<?php
$image = "vader.png"; //imagen sobre la que hare marca
$marca_agua = "marca.png"; //imagen que usare de marca

$img = imagecreatefrompng($marca_agua); //aqui depende el formato del archivo original con el que voy a crear la marca de agua en este caso es png el de marca
$ext = strtolower(substr($image, -3)); //aca puedo usar en dos lineas $ext uno para substr y otro para pedirle que haga los caracteres en minuscula

// Creamos la imagen en la variable $img2 con el formato correspondiente
switch ($ext) {
    case 'gif':
        $img2 = imagecreatefromgif($image);
        break;
    case 'jpeg':
        $img2 = imagecreatefromjpeg($image);
        break;
    case 'png':
        $img2 = imagecreatefrompng($image);
        break;
}

// Hacemos copia de las imágenes originales, la de marca de agua dividimos para que sea menor 
imagecopy($img2, $img, (imagesx($img2) / 2), (imagesy($img2) / 2), 0, 0, imagesx($img), imagesy($img));

// Damos formato que queremos a la imagen
header("Content-type: image/png");
// Mostramos la imagen en lugar de guardarla en un archivo
imagepng($img2, "marcagua.png");
// Liberamos memoria
imagedestroy($img);
imagedestroy($img2);
?>
