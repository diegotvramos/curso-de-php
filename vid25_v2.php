<?php
class Coche {
    var $ruedas;//(CARACTERISTICAS)propiedad o atributo de los coches
    var $color;
    var $motor;

    
    function __construct(){// esta funcion en particular es un METODO CONSTRUCTOR. es un metodo cunstructor. 
                    //por q tiene el mismo nombre de la clase 2022 ya no lleva nombre.
        $this->ruedas=4;  //ESTADO INICIAL. 
        $this->color="";
        $this->motor=1600;

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
    function establece_color($color_coche, $nombre_coche){//es un metodo o funcion. 
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