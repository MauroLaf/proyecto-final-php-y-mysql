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

	<div id="unidad1">
		<section>
			<h2>Agenda de clases</h2>

			<form action='insertar_clases.php' method="POST">
				<ul>
					<li><input type="text" name="unidad" size="30" placeholder="Ingrese la unidad, ejemplo: 'Unidad 1'"></li>
					<li><input type="date" name="fecha"></li>
					<li><input type="submit" value="Enviar"></li>
				</ul>
			</form>

			<?php
			if(isset($_GET['ok'])) {
				echo"<p>Unidad cargada perfectamente!</p>";
			}
			?>

			<ul>
				<li><a href="unidad1.php?clave=ver_clases" class="boton-clases">Ver clases</a></li>
				<li><a href="unidad1.php?clave=ocultar_clases" class="boton-clases">Ocultar clases</a></li>
			</ul>
			<?php
			if (isset($_GET['clave'])){
				$clave = $_GET['clave'];
				switch ($clave) {
					case 'ver_clases':
						include("ver_clases.php");
						break;
					case 'ocultar_clases':
						break;
				}	
			}
			?>
		</section>
	<aside>
	</div>
    
  </aside>
	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>
</body>
</html>