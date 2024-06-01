<?php //incluyo archivo de procesamiento
include("usuarios.php");
//verifico que venga informacion del form a traves de POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
//instancio la clase usuario
    $usuario = new Usuarios($nombre, $apellido, $fecha_nacimiento);
// Llamar al método imprime_caracteristicas() que esta en usuarios.php
$usuario->imprime_caracteristicas(); //ATENCION!!si hubiera puesto "private function" en imprime_caracteristicas no podria llamarla desde otro lugar que no fuera usuarios.php 
}
?>