<?php
class Coche {
    protected $ruedas;//encapsulamos la variable RUEDA con el modificador "private" solo se puede ver en esta clase.
    var $color;// cuando solo hay una VAR es como si fuera Una variable publica.
    protected $motor;
//el modificador protected hace q la variable sea accesible desde las clases heredadas mas.
    
    function __construct(){// constructor, se encarga de dar un estado inicial al objeto 
        $this->ruedas=4;  // 
        $this->color="";
        $this->motor=1600;

    }
    /*la funcion GET debe estar dentro de la clase que tiene el PRIVATE.*/
    function get_ruedas(){ // por convencion se llama asi la funcion. puedes llamarla a tu manera.
        return $this->ruedas; //devuelve el numero de ruedas
    }
    function get_motor(){ // por convencion se llama asi la funcion. puedes llamarla a tu manera.
        return $this->motor; //devuelve el numero de ruedas
    }
    function arrancar(){//que puede hacer un objeto de tipo coche? METODOS(funcionalidades) 
        echo "Estoy Arrancando<br>";
    }
    function girar(){
        echo "Estoy Girando<br>";
    }
    function frenar(){
        echo "Estoy frenando<br>";
    }
    function set_color($color_coche, $nombre_coche){//es un metodo o funcion. 
        $this->color=$color_coche; //asigna a la propiedad COLOR el parametro que le pasamos a esta funcion
        echo "el color de  ". $nombre_coche .  " es: " . $this->color  . "<br>";
    }
}



class Camion extends Coche {    

    function __construct(){//metodo Constructor
        $this->ruedas=10;  //ESTADO INICIAL. 
        $this->color="gris"; 
        $this->motor=2600;
    }
        function establece_color($color_camion, $nombre_camion){//es un metodo o funcion. 
            $this->color=$color_camion; //asigna a la propiedad COLOR el parametro que le pasamos a esta funcion
            echo "el color de  ". $nombre_camion .  " es: " . $this->color  . "<br>";
        }

        function arrancar(){
            parent::arrancar();// ejecuta por completo el metodo arrancar.
            echo "camion arancado";//luego ejecuta esta linea de codigo.
        }

}
?>  