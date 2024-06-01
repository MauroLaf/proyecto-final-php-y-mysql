<?php
include("constantes.php");
include("basededatos.php");
include("producto.php"); // ¡Incluye archivos!
include("carrito.php");

// Si se proporciona un 'id' en la URL, intenta eliminar la compra
if (isset($_GET['id'])) {
    $base = new Basededatos(SERVIDOR, USUARIO, PASS, BASE);
    $carrito = new Carrito($base);
    
    // Llama a la función para eliminar la compra
    $carrito->eliminar_compra($_GET['id']);
}

// Redirige a la página principal
header("Location: unidad7.php#Compras");
?>
