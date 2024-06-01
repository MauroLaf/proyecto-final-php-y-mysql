<?php
// Variable para identificar dónde está la imagen que voy a utilizar como base para generar la imagen en miniatura
$scr_img = imagecreatefromjpeg("unidad4.jpg"); // Imagen de origen (source), referenciamos la ruta y creamos la imagen

// Obtenemos las dimensiones de la imagen original
$alto_original = imagesy($scr_img);
$ancho_original = imagesx($scr_img);

// Definimos medidas exactas de la imagen que utilizará la imagen mini
$alto_min = 150;
$ancho_min = 150;

// Imagen de destino
$dst_img = imagecreatetruecolor($ancho_min, $alto_min);

// Redimensionamos la imagen (destino, original, tamaño de los ejes de la imagen mini, ancho y alto de la imagen de destino, ejes x e y de la imagen original)
imagecopyresized($dst_img, $scr_img, 0, 0, 0, 0, $ancho_min, $alto_min, $ancho_original, $alto_original);

// Definimos la nueva imagen, es decir, la creamos
$ruta_thumb = __DIR__ . "/unidad4_thumb.jpg";
imagejpeg($dst_img, $ruta_thumb);

// Liberamos la memoria
imagedestroy($scr_img);
imagedestroy($dst_img);
?>
