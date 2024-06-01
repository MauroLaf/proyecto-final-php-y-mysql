<?php   
//ACLARACION si yo incluyo el archivo cargarusuario p/ simplificar los msjs se imprimen en unidad8 por la redireccion, mejor tratar por separado e incluir lo necesario
include("basededatos.php");
include("registro.php");
include("constantes.php");

$base = new Basededatos(SERVIDOR, USUARIO, PASS, BASE);
$Registro = new Registro($base);

if (isset($_POST['Email']) && isset($_POST['Clave'])) {
    $email = $_POST['Email'];
    $clave = $_POST['Clave'];

    $datosUsuario = $Registro->mostrar_registro($email);

    $credencialesValidas = false;

    foreach ($datosUsuario as $usuario) {
        if (password_verify($clave, $usuario['clave'])) {
            $credencialesValidas = true;
            break;  // Si encontramos una coincidencia, salimos del bucle
        }
    }

    if ($credencialesValidas) {
        header("Location: unidad8.php?verif_ok#aside");
    } else {
        header("Location: unidad8.php?verif_error#aside");
    }
} else {
    header("Location: unidad8.php?verif_error#aside");
}
?>
