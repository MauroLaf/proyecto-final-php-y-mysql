<?php
session_start();

// Verificar el código del Captcha
$codigo_ingresado = $_POST['codigo'];

if ($codigo_ingresado == $_SESSION['captcha']) {
    // verifica que Código ingrsado  coincide c/ el almacenado en la $_SESSION 
    // Continuar con el procesamiento de los datos y la inserción en la base de datos
    $dni_paciente = $_POST['dni'];
    $nombre_paciente = $_POST['Nombre'];
    $apellido_paciente = $_POST['Apellido'];
    $email_paciente = $_POST['Email'];
    $consulta_paciente = $_POST['Consulta'];

    // Incluir la conexión a la base de datos
    include("conexion.php");

    $query = "INSERT INTO consultas (dni, nombre, apellido, email, consulta) 
              VALUES ($dni_paciente, '$nombre_paciente', '$apellido_paciente', '$email_paciente', '$consulta_paciente')";

    if (mysqli_query($conexion_unidad, $query)) {
        // Redireccionar a unidad5.php con un mensaje de éxito
        header("Location: unidad5.php?ok");
    } else {
        // Redireccionar a unidad5.php con un mensaje de error en la inserción
        header("Location: unidad5.php?error=db");
    }

    // Cerrar la conexión a la base de datos, si es necesario
    // mysqli_close($conexion_unidad);

} else {
    // Código del Captcha es incorrecto
    // Redireccionar a unidad5.php con un mensaje de error
    header("Location: unidad5.php?error=captcha");
}
?>
