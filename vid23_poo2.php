<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        }

        $renault= new Coche();//estado inicial al objeto
        $mazda= new Coche();
        $seat= new Coche();

        $mazda->girar();//Queremos q el mazda GIRE. (METODO)
        echo $mazda->ruedas; //lo q hacemos es acceder a una (PROPIEDAD) de nuestro objeto
    ?>
</body>
</html>