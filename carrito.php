<?php
class Carrito {
    private $bd;

    public function __construct($base) {
        $this->bd = $base;
    }

    public function introducir_compra($codigo, $producto, $descripcion, $precio) {
        $SQL = $this->bd->ejecutarSQL("INSERT INTO compras (id_compra, codigo, producto, descripcion, precio) VALUES (DEFAULT, '$codigo', '$producto', '$descripcion', '$precio')");
        return $SQL;
    }
    
    

    public function eliminar_compra($id_compra) {
        $SQL = $this->bd->ejecutarSQL("DELETE FROM compras WHERE id_compra = '$id_compra'");
        return $SQL;
    }
    

    public function listar_compra() {
        $query = "SELECT * FROM compras";
        return $this->bd->ejecutarSQL($query);
    }
}
?>