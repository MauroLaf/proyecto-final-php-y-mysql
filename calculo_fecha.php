<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $dia = isset($_POST["dia"]) ? $_POST["dia"] : 0;
    $mes = isset($_POST["mes"]) ? $_POST["mes"] : 0;
    $anio = isset($_POST["anio"]) ? $_POST["anio"] : 0;

    // Validar los datos (puedes agregar más validaciones si es necesario)
    if (checkdate($mes, $dia, $anio)) {
        // Calcula cuántos días faltan para la fecha ingresada
        $hoy = time();
        $fecha_ingresada = strtotime("$dia-$mes-$anio");

        if ($fecha_ingresada !== false) {
            $dias_faltantes = intval(($fecha_ingresada - $hoy) / 86400); // 86400 segundos en un día

            // Redirigir a unidad2.php con el resultado como parámetro en la URL
            header("Location: unidad2.php?dias=$dias_faltantes");
            exit();
        } else {
            // Redirigir a unidad2.php con indicador de fecha no válida
            header("Location: unidad2.php?notok=1");
            exit();
        }
    } 
} else {
    // Si alguien intenta acceder a calculo_fecha.php directamente sin enviar el formulario,
    // redirige a la página de inicio o a algún lugar adecuado
    header("Location: index.php"); // Cambia index.php por la página principal
    exit();
}
?>
