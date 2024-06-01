<?php

//ESTE ARCHIVO USO PARA INCLUIR ARCHIVOS, INSTANCIAR TODO Y REDIRECCIONAR (PREVIA VERIFICACION DE DATOS QUE INCLYO COMO EL FORM)
include("basededatos.php");
include("registro.php");
include("constantes.php");

$base = new Basededatos(SERVIDOR, USUARIO, PASS, BASE);
$Registro = new Registro($base);

if (isset($_POST['email']) && isset($_POST['clave'])) {
    $email = $_POST['email']; // Asigna el valor de $_POST['email'] a la variable $email
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT, array('cost' => 4));

    // Verificar si el correo electrónico ya existe
    if ($Registro->verificar_existencia($email)) {
        // El correo ya existe, imprime un mensaje
        header("Location: unidad8.php?correo_exist#Registro");
        exit();
    }

    // Con esto cargamos datos del formulario con la clave hasheada
    // Hashear la contraseña
    $Registro->insertar_registro($email, $clave);
    
    header("Location: unidad8.php?ok#Registro");
    exit();
} else {
    // Redirigir con mensaje de error si los datos no están presentes
    header("Location: unidad8.php?error#Registro");
    exit();
}
?>
