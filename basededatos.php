<?php

class Basededatos {
    private $conexion;
    public $error;

    function __construct($servidor, $usuario, $pass, $base) {
        // Ponemos un if con error para saber si no se puede conectar usando una función que ya viene incorporada _connect con los parámetros del servidor
        if (!$this->_connect($servidor, $usuario, $pass, $base)) {
            $this->error = $this->conexion->connect_error; // Recordar que al señalar una propiedad como "error" va sin "$" y luego señalamos otra propiedad dentro de mysqli que es "connect_error", esto nos muestra el tipo de error. Lo que le decimos con $this-> es que se asocie eso con la variable o propiedad error
        }
    }

    private function _connect($host, $user, $pass, $base) {
        // Guardamos en esa variable de conexión, la conexión con bd y generamos los métodos/funciones
        $this->conexion = new mysqli($host, $user, $pass, $base);
        return !$this->conexion->connect_errno; // Retorna true si la conexión es exitosa, false en caso de error
    }

    public function ejecutarSQL($query) {
        $instruccionSQL = strtoupper(substr($query, 0, 6)); // Sustrae los 6 primeros caracteres de la cadena de caracteres y le decimos que sea todo del mismo formato mayúsculas o minúsculas
        switch ($instruccionSQL) {
            case 'INSERT':
                // Ahora ejecutamos una de las instrucciones de arriba dentro de la bd para ello siempre usamos el método query
                $resultado = $this->conexion->query($query); // Diferenciar aquí de la propiedad query de mysqli con la propiedad que pusimos para consultar llamada $query
                if (!$resultado) {
                    $this->error = $this->conexion->error; // Señalamos en caso de error que se ejecute el error de conexión
                    return false;
                } else {
                    return $this->conexion->insert_id; // En caso de que se inserten los datos, que devuelva a la conexión y además inserte el id 
                }
                break;
                

            // En el caso de select debo hacer un bucle para listar y dentro un array desde el resultado que tiene la base de datos, no desde 0 (fetch_tipo de array) para seleccionar y no me traiga todos los productos de la lista
            case 'SELECT':
                $resultado = $this->conexion->query($query); // Ejecutamos el query
                if (!$resultado) {
                    $this->error = $this->conexion->error;
                    return false;
                } else {
                    $mostrarInfo = array();
                    while ($listarInfo = $resultado->fetch_assoc()) {
                        $mostrarInfo[] = $listarInfo; // Ponemos dos dimensiones 
                    }
                    // Esto me va a devolver lo que tiene en la tabla
                    return $mostrarInfo;
                }
                break; // Esto no es necesario porque volverá al código de mostrarInfo

            case 'UPDATE':
            case 'DELETE':
                $resultado = $this->conexion->query($query);
                if (!$resultado) {
                    $this->error = $this->conexion->error;
                    return false;
                } else {
                    return $this->conexion->affected_rows;
                }
                break;
            //esto en caso de que el error provenga por alguna otra consulta
            default:
                $this->error = 'Consulta no permitida';
                return false;
        }
    }
}

?>
