<?php //aqui solo se pondra la clase registro, la logica de manejo de form estara en registro
class Registro {
    private $bd;
    public $email;
    public $clave;

    public function __construct($base) {
        $this->bd = $base;
    }

    public function insertar_registro($email, $clave) {
        $SQL = $this->bd->ejecutarSQL("INSERT INTO registro (email, clave) VALUES ('$email', '$clave')");
        return $SQL;
    }
//con esta funcion selecciono la columna clave de la bd donde el email coincida con el email proporcionado
    public function mostrar_registro($email) { //PONER AQUI UN PARAMETRO IMPLICA QUE PARA CONSULTAR REQUIERE COMO CONDICION QUE EXISTA UN EMAIL
     
        $SQL = $this->bd->ejecutarSQL("SELECT clave FROM registro WHERE email = '$email'");
        return $SQL; //toda la consulta realizada que se hace mediante un fetch assoc en basededatos me devuelve el resultado a $SQL y se almacena en esa variable....ahora para verificar debo ir al otro archivo y hacer el proceso.
    }
    
    public function verificar_existencia($email) {
        $query = "SELECT COUNT(*) as total FROM registro WHERE email = '$email'";
        $result = $this->bd->ejecutarSQL($query);
    
        if ($result && !empty($result) && isset($result[0]['total'])) {
            return $result[0]['total'] > 0;
        }
    
        return false;
    }
    
        }
    
?>

