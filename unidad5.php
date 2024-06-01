<?php
session_start();
?>
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
        <section id="unidad5">
            <h2>Consultas</h2>
            <form action='cargar.php' method="POST">
                <ul>
                    <li>
                        <label>DNI: <input type="number" name="dni" maxlength="10" placeholder="Ingrese su DNI" required></label>
                    </li>
                    <li>
                        <label>Nombre: <input type="text" name="Nombre" maxlength="30" placeholder="Ingrese su Nombre" required></label>
                    </li>
                    <li>
                        <label>Apellido: <input type="text" name="Apellido" maxlength="50" placeholder="Ingrese su Apellido" required></label>
                    </li>
                    <li>
                        <label>Email: <input type="email" name="Email" maxlength="100" placeholder="Ingrese su Email" required></label>
                    </li>
                    <li>
                        <label>Consulta: <textarea name="Consulta" maxlength="255" placeholder="Ingrese su consulta" required></textarea></label>
                    </li>
                    <li> <!-- se ingresa como img el captcha para q no se lea cod -->
                        <img src="img_captcha.php" alt="imagen_captcha"> 
                        <input type="text" name="codigo" maxlength="5" placeholder="Ingrese código" required>
                    </li>
                    <li>
                        <input type="submit" name='enviar_cons' value="Enviar">
                    </li>
                </ul>
            </form>
			<?php // Función para generar un captcha simple
function generarCaptcha() {
    $cadenaCaptcha = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz+%$&#";
    $codCaptcha = ''; //no se asigna valor se le dara en cada iteracion del bucle for
	//marcamos el inicio del bucle y se mantendra hasta que sume 5 vueltas 0<5 sumando de a 1 luego concatenamos la cadena con ".=" y le decimos que arroje un valor aleatorio por cada vuelta entre 68 caracteres de la cadena
    for ($i = 0; $i < 5; $i++) { 
        $codCaptcha .= $cadenaCaptcha[rand(0, 68)];
    }
    return $codCaptcha;
}
$_SESSION['captcha'] = generarCaptcha();
?>
            <?php
            // ...aqui es que verificamos en la url si hay error y si ese error es de captcha ) ...
			
			if (isset($_GET['ok'])) { //se ejecuta si esta cond es true
				echo "<p>Consulta cargada exitosamente</p>";
			} elseif (isset($_GET['error']) && $_GET['error'] == 'db') { //si la anterior es false y esta es verdadera
				echo "<p>Error: La consulta no se ha cargado, inténtelo nuevamente</p>";
			} elseif (isset($_GET['error']) && $_GET['error'] == 'captcha') { //si ninguna de las anteriores es verdadera
				echo "<p>Error: Código de Captcha incorrecto</p>";
			}
            ?>
        </section>
        <aside>
            <!-- Contenido del aside -->
        </aside>
        <footer>
            <a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
        </footer>
    </div>
</body>
</html>

