<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
 
<body>
 
<div class="container">
	<header>
		<h1>Programación en PHP y MySQL - Nivel Avanzado</h1>
	

	<nav>
		<?php include("botonera.php"); ?>
	</nav>
	</header>
	<section id="unidad8">
	<?php
            include("constantes.php");
            include("basededatos.php");
	?>
		<div>
			<h2>Registro</h2>
			<form action='cargarusuario.php' method="POST">
		<label>Email: <input type="email" name="email" maxlength="100" placeholder="Ingrese su Email" required></label>
            <label>Contraseña: <input type="password" name="clave" maxlength="60" placeholder="Ingrese su Clave" required></label>
            <input type="submit" name='cargar_datos' value="Enviar">
			</form>
			<?php
			if (isset($_GET['correo_exist'])){
				echo "El correo electrónico ya está registrado. Intente con otro";
			}
			else if (isset($_GET['ok'])) {
    		echo "<p>Datos cargados correctamente!</p>";
			}

			elseif (isset($_GET['error'])) {
    		echo "<p>Error al verificar datos, inténtalo de nuevo.</p>";
			}
	?>
		</div>
	</section>
	<aside class="aside">
    <div>
			<h2>Ingreso</h2>
		<form action='verificarusuario.php' method="POST">
		<label>Email: <input type="email" name="Email" maxlength="100" placeholder="Ingrese su Email" required></label>
            <label>Contraseña: <input type="password" name="Clave" maxlength="60" placeholder="Ingrese su Clave" required></label>
            <input type="submit" name='cargar_datos' value="Enviar">
			</form>
			<?php
			if (isset($_GET['verif_ok'])) {
    		echo "<p>Datos verificados correctamente!</p>";
			}

			elseif (isset($_GET['verif_error'])) {
    		echo "<p>Correo o contraseña erroneo. Por favor, inténtalo de nuevo.</p>";
			}

		?>
	</div>
  </aside>
	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>
</body>
</html>