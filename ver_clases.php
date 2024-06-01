<?php
include("conexion.php");
$consultar_clases = mysqli_query($conexion_unidad, "SELECT unidad, fecha FROM clases");
while($listar_clases = mysqli_fetch_array($consultar_clases)) {
?>
    <div>
        <h3><?php echo $listar_clases['unidad'];?></h3>
        <p>Fecha: <?php echo $listar_clases['fecha'];?></p>
    </div>

<?php } ?>