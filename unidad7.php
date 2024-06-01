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
    <section id="unidad7">
        <div id="tabla1">
            <h2>Ver Productos</h2>
            <?php
            include("constantes.php");
            include("basededatos.php");
            include("producto.php"); // ¡Incluimos archivos con los que trabajaremos archivos!
            include("carrito.php");

                //instanciamos las clases
            $base = new Basededatos(SERVIDOR, USUARIO, PASS, BASE);
            $prod = new Producto($base);
                //llamamos la funcion para listar productos y la guardamos en variable
            $mostrar_productos = $prod->listar_productos();
            ?>
            <table>
                <tr>
                    <th>Código</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Comprar</th>
                </tr>
                <?php
                for ($i = 0; $i < count($mostrar_productos); $i++) {
                    $codigo = $mostrar_productos[$i]['codigo'];
                    $producto = urlencode($mostrar_productos[$i]['producto']);
                    $descripcion = urlencode($mostrar_productos[$i]['descripcion']);
                    $precio = $mostrar_productos[$i]['precio'];
                    ?>
                    <tr>
                        <td><?php echo $mostrar_productos[$i]['codigo'] ?></td>
                        <td><?php echo $mostrar_productos[$i]['producto'] ?></td>
                        <td><?php echo $mostrar_productos[$i]['descripcion'] ?></td>
                        <td><?php echo $mostrar_productos[$i]['precio'] ?></td>
                        <td>
                        <a href="unidad7.php?comprar=true&codigo=<?php echo $codigo; ?>&producto=<?php echo $producto; ?>&descripcion=<?php echo $descripcion; ?>&precio=<?php echo $precio; ?>"><img src="iconos/carrito.png" alt="Comprar"></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        
        <div id="tabla2">
            <h2>Carrito de Compras</h2>
            <table>
                <tr>
                    <th>Código</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Modificar/Eliminar</th>
                </tr>
                <?php

                //instanciamos clase de carrito para usar sus funciones
                $carrito = new Carrito($base);

                if (isset($_GET['comprar'])) {
                    $codigo = $_GET['codigo'];
                    $producto = $_GET['producto'];
                    $descripcion = $_GET['descripcion'];
                    $precio = $_GET['precio'];
                
                    // Intenta introducir la compra en el carrito, con la funcion de introducir_compra y se almacena en resultado_compra
                    $resultado_compra = $carrito->introducir_compra($codigo, $producto, $descripcion, $precio);
                
                    if ($resultado_compra) {
                        echo "Compra realizada correctamente.";
                    } else {
                        echo "Error al realizar la compra.";
                    }
                }
                //llamamos funcion de listar lo que se compro y almacenamos en variable
                $compras_en_carrito = $carrito->listar_compra();
                //var_dump($compras_en_carrito);//esto muestra el contenido del carrito y la info q trae
                if ($compras_en_carrito === false) {
                    echo "Error al obtener datos de la tabla compras.";
                }
                for ($i = 0; $i < count($compras_en_carrito); $i++) {
                }
                
                for ($i = 0; $i < count($compras_en_carrito); $i++) {
                    ?>
                    <tr>
                        <td><?php echo $compras_en_carrito[$i]['codigo'] ?></td>
                        <td><?php echo $compras_en_carrito[$i]['producto'] ?></td>
                        <td><?php echo $compras_en_carrito[$i]['descripcion'] ?></td>
                        <td><?php echo $compras_en_carrito[$i]['precio'] ?></td>
                        <td>   <!--ESTO SOLO USARE EN CASO DE QUE DESEE MODIFICAR ALGO Y CREARE UN ARCHIVO PARA MODIFICAR CON DATOS TRAIDOS POR GET USANDO METODO UPDATE-->
                            <a href="unidad7.php?id=<?php echo $compras_en_carrito[$i]['id_compra']; ?>"> 
                                <img src="iconos/modif.png" alt="Modificar"></a><br>
                          <!--aqui le diremos que imprima en el cod fuente el id del producto seleccionado para usarlo en las func eliminar-->
                            <a href="unidad7.php?id=<?php echo $compras_en_carrito[$i]['id_compra']; ?>"> 
                                <img src="iconos/basura.png" alt="Eliminar"></a></td>
                    </tr>
                    <?php
                    //ACLARACION PODRIA PONER LA LOGICA ENTERA DEL ARCHIVO DE ELIMINAR AQUI PERO INCLUYO SOLO EL ARCHIVO PARA NO HACERLO LARGO
                   // Si se proporciona un 'id' en la URL, intenta eliminar la compra
    if (isset($_GET['id'])) {
        $base = new Basededatos(SERVIDOR, USUARIO, PASS, BASE);
        $carrito = new Carrito($base);

        // Llama a la función para eliminar la compra
        $carrito->eliminar_compra($_GET['id']);
    }
                }
                ?>
            </table>
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
