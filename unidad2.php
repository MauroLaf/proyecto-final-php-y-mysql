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
	<section>
		<h2>Eventos</h2>
		<form method="POST" action="calculo_fecha.php">
			<label for="dia">Día:</label>
			<input type="number" id="dia" name="dia" required min="1" max="31">
			<label for="mes">Mes:</label>
			<input type="number" id="mes" name="mes" required min="1" max="12">
			<label for="anio">Año:</label>
			<input type="number" id="anio" name="anio" required min="2023">
			<input type="submit" value="Calcular">
		</form>
		<?php
if (isset($_GET['dias'])) {
    echo "<p>Faltan " . $_GET['dias'] . " días para la fecha ingresada.</p>";
} elseif (isset($_GET['notok'])) {
    echo "<p>La fecha ingresada no es válida. Intente ingresar otra fecha.</p>";
}

?>
	</section>
	<aside>
    
  </aside>
	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>
</body>
</html>