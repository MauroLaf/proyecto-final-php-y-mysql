<?php

class Producto {
    public $codigo;
    public $producto;
    public $descripcion;
    public $precio;
    public $bd;

    public function __construct($base) {
        $this->bd = $base;
    }

    public function listar_productos() {
        $SQL = $this->bd->ejecutarSQL("SELECT * FROM productos");
        return $SQL;
    }
}

?>
