<?php
$unidad = $_POST['unidad'];
$fecha = $_POST['fecha'];

include("conexion.php");

mysqli_query($conexion_unidad, "INSERT INTO clases (unidad, fecha) VALUES ('$unidad', '$fecha')");

header("Location: unidad1.php?ok");

?>