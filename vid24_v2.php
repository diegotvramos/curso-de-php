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

         /*------------instancias
        $renault= new Coche();//estado inicial al objeto
        $mazda= new Coche();
        $seat= new Coche();
        $renault->establece_color("rojo","renault");// asi se llama a una funcion.
        $seat->establece_color("azul","seat");*/

        //---------------------------------------------------------------------------------------------
        class Camion {
            var $ruedas;//(CARACTERISTICAS)propiedad o atributo de los coches
            var $color;
            var $motor;

            
            function __construct(){//metodo Constructor
                $this->ruedas=10;  //ESTADO INICIAL. 
                $this->color="gris"; 
                $this->motor=2600;

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
        }
?>