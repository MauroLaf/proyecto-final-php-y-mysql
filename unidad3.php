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
	<section id="unidad3">
		<h2>Comentarios</h2>

		<form action='comentarios.php' method="POST">
				<ul>
				<li><input type="text" name="nombre" maxlength="30" placeholder="Ingrese su Nombre" required></li>
				<li><input type="text" name="apellido" maxlength="50" placeholder="Ingrese su Apellido" required></li>
                <li><input type="email" name="correo" maxlength="100" placeholder="Ingrese su Email" required></li>
                <li><textarea name="comentario" maxlength="255" placeholder="Ingrese su comentario" required></textarea></li>
                <li><input type="submit" name='enviar_com' value="Enviar"></li>
				</ul>
			</form>

			<?php
			if(isset($_GET['ok_comentario'])) {
				echo"<p>Comentario cargado</p>";
			}
			?>

			<ul>
				<li><a href="unidad3.php?clave=ver_comentarios" class="boton-com">Ver comentarios</a></li>
				<li><a href="unidad3.php?clave=ocultar_comentarios" class="boton-com">Ocultar comentarios</a></li>
			</ul>
			<?php
			if (isset($_GET['clave'])){
				$clave = $_GET['clave'];
				switch ($clave) {
					case 'ver_comentarios':
						$coment = fopen('comentarios.txt', 'r');
						if ($coment) {
							while (!feof($coment)) {
								$comentario = fgets($coment);
								if (trim($comentario)) {
									echo '<div class="comentario">' . $comentario . '</div>';
								}
							}
							fclose($coment);
						}
						break;
					case 'ocultar_comentarios':
						break;
				}	
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