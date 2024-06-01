<?php
session_start();
header("Content-type: image/jpeg");

$imagen_cap = imagecreate(100, 30);
imagecolorallocate($imagen_cap, 125, 227, 55);
$color_text = imagecolorallocate($imagen_cap, 55, 55, 55);

// El tercer argumento debe ser el texto a mostrar
// El cuarto argumento debe ser el color del texto (índice de color, no RGB)
imagestring($imagen_cap, 5, 10, 5, $_SESSION['captcha'], $color_text);

imagejpeg($imagen_cap);
?>
