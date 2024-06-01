<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" href="css/lightbox.min.css">
</head>
 
<body>
 
<div class="container">
    <header>
        <h1>Programación en PHP y MySQL - Nivel Avanzado</h1>
        <nav>
            <?php include("botonera.php"); ?>
        </nav>
    </header>
    <section id="unidad4">
        <h2>Imágenes con PHP</h2>
        <div>
        <h3>Formato de Imágenes</h3>
        <?php
			if (function_exists('imagetypes')) {
            if (imagetypes() & IMG_GIF) {
                echo "<p>GD tiene soporte para imágenes GIF.</p>";
            } else {
                echo "<p>GD no tiene soporte para imágenes GIF.</p>";
            }

            if (imagetypes() & IMG_JPEG) {
                echo "<p>GD tiene soporte para imágenes JPEG.</p>";
            } else {
                echo "<p>GD no tiene soporte para imágenes JPEG.</p>";
            }

            if (imagetypes() & IMG_PNG) {
                echo "<p>GD tiene soporte para imágenes PNG.</p>";
            } else {
                echo "<p>GD no tiene soporte para imágenes PNG.</p>";
            }
        } else {
            echo "<p>La función imagetypes() no está disponible en este entorno PHP.</p>";
        }
        ?>
        </div>
        <div>
        <h2>Marca de Agua</h2>
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
imagecopy($img2, $img, (imagesx($img2) / 3), (imagesy($img2) / 3), 0, 0, imagesx($img), imagesy($img));

//header("Content-type: image/png");Damos formato que queremos a la imagen no pongo porque se desconfigura
// Mostramos la imagen en lugar de guardarla en un archivo
imagepng($img2, "marcagua.png");
// Liberamos memoria
imagedestroy($img);
imagedestroy($img2);
?>

        <img src="marcagua.png" alt="Marca de Agua">
</div>
<div>
        <h2>Thumbnail</h2>
<?php include("thumbnail.php"); ?>
<a href="unidad4.jpg" data-lightbox="image-1"><img src="unidad4_thumb.jpg" alt="Thumbnail"></a>
        </div>
    </section>
    <aside>
    </aside>
    <footer>
        <a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
    </footer>
</div>
    <script type="text/javascript" src="js/lightbox.js"></script>
</body>
</html>
