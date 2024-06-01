<?php
if(isset($_POST['enviar_com'])) {
    // Obtener la fecha actual
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha_actual = date("d-m-Y H:i");

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $comentario = $_POST['comentario'];
    
    $contenido= "<hr><p><b>Nombre:</b> ".$nombre."</p><p><b>Apellido:</b> ".$apellido."</p><p><b>Correo:</b> ".$correo."</p><p><b>Fecha:</b> ".$fecha_actual." hs<p/><p><b>Comentario:</b> ".$comentario."</p></hr>";

    $file = fopen("comentarios.txt", "a+") or die("Error en la apertura del archivo");

    fputs($file, $contenido);
    fclose($file);

    header("Location: unidad3.php?ok_comentario");
}

?>