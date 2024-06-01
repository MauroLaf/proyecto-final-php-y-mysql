<?php
class Usuarios { //{}engloba toda la clase hasta el final, se define el objeto y se almacena las prop en variables
    private $nombre; //propiedades privates
    private $apellido;
    private $fecha_nacimiento;

    public function __construct($nom, $ape, $fna) { // uso metodo constructor con variables referidas a las propiedades de arriba pero con cualquier nombre, si no defino el metodo se pone public por default
        $this->nombre = $nom; //con this señalo al objeto que "VA SIN $" y su variable definda mas arriba
        $this->apellido = $ape;
        $this->fecha_nacimiento = $fna;
    }
    //SEGUN CONSIGNA DEBE ACCEDERSE A ESTE METODO/FUNCION mediante CALCULAR EDAD QUE DEBE ESTAR EN ESTE DOC. YA QUE ES PRIVATE
    private function calcular_edad() { //la funcion puede llevar cualquier nombre referido
        date_default_timezone_set('America/Argentina/Buenos_Aires'); //saco zona horaria del servidor
        //uso time() para obtener tiempo actual (timestamp) en formato Unix.  Devuelve tiempo actual medido en segundos desde 1 de enero de 1970 00:00:00 GMT)
        $hoy = time(); 
        // calcula la edad comparando el año actual con el año de su fecha de nacimiento.
        $fecha_nacimiento = strtotime($this->fecha_nacimiento);
        //luego de obtener tiempo, le digo que obtenga la fecha (date) en "años-Y" teniendo en cuenta el $hoy, que proporciona la fecha actual representada en años
        $edad = date('Y', $hoy) - date('Y', $fecha_nacimiento);
        //pongo condicional por si la fecha de nac aun no ha ocurrido, en ese caso obtengo con dat 'mes y dia' teniendo en cuenta la fecha actual '$hoy' y luego le digo que si es menor a la 'fecha de nac' se le reste -1 a '$edad' para ajustar correctamente
        if (date('md', $hoy) < date('md', $fecha_nacimiento)) {
            $edad--;
        }

        return $edad; //le decimos que terminado retore a la variable $edad para que este disponible en caso de necesitarse en otro codigo
    }
    //creamos una funcion para imprimir. EN ESTE CASO EL METODO/FUNCION SERA PUBLIC YA QUE LO DEBO IMPRIMIR E INSTANCIAR DESDE CARACT_USUARIOS.PHP
    public function imprime_caracteristicas() { 
        $edad = $this->calcular_edad(); // como tengo que definir la variable $edad primero antes de concatenarla indico de donde viene "calcular_edad()" para obtener la edad    
        echo "<p>Nombre: ".$this->nombre."</p><br>"."<p>Apellido: ".$this->apellido."</p><br>"."<p>Edad: ".$edad." años</p><br>"; //tener en cuenta que concateno las cadenas de texto que van con "" luego va .$variable. y /p y br tambien son cadenas de texto asi que van entre ""
        }

}
?>