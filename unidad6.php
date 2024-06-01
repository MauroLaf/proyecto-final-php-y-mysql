<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="estilos.css">
</head>
 
<body>
 
<div class="container">
    <header>
        <h1>Programación en PHP y MySQL - Nivel Avanzado</h1>
        <nav>
            <?php include("botonera.php"); ?>
        </nav>
    </header>
    <section id="unidad6">
    <div>    
	<h2>Usuarios</h2>
		<form action='unidad6.php' method="POST">
            <label>Nombre: <input type="text" name="nombre" maxlength="30" placeholder="Ingrese su Nombre" required></label>
            <label>Apellido: <input type="text" name="apellido" maxlength="50" placeholder="Ingrese su Apellido" required></label>
            <label>Fecha de Nacimiento: <input type="date" name="fecha_nacimiento" maxlength="10" placeholder="Ingrese su Fecha de Nacimiento" required></label>
            <input type="submit" name='cargar_usuario' value="Enviar">
        </form>
		</div>
		<div>
		<h2>Características del Usuario:</h2>	 
		<?php
//incluyo archivo
include("caract_usuarios.php");
?>
</div>
    </section>
    <aside>
    
    </aside>
    <footer>
        <a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
    </footer>
</div>
</body>
</html>
