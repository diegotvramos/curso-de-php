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
        $datos = array("nombre"=>"juan","apellido"=>"Gomez","edad"=>21); //array Asociativo

        /*como agregar un elemento mas a un array Asociativo */
        $datos["pais"]="españa";
        //$datos="martin"; // sobre escribe la variable anterior
        /*comprobamos si DATOS es un array */

        /*if (is_array($datos)) {
            echo "es un array";
        }else {
            echo "no es un array";
        }*/

        foreach ($datos as $clave => $valor) {
            echo "a $clave le corresponde $valor <br>";
        }
        echo "<br>";

        /*//array indexado 
        $semana[]="lunes";
        $semana[]="martes";
        $semana[]="miercoles";
        $semana[]="jueves";
        

        for ($i=0; $i < 4 ; $i++) { 
            echo $semana[$i]. "<br>";
        }
        //si no sabemos el numero total de las posiciones en un array usamos la funcion count que cuenta los elementos del array
        for ($i=0; $i < count($semana); $i++) { 
            echo $semana[$i]. "<br>";
        }
        
        $semana[]="viernes";//agregamos un elemento mas al array
        for ($i=0; $i < count($semana); $i++) { 
            echo $semana[$i]. "<br>";
        }
        */

        //ordenar un array
        $semana=array("lunes","martes","miercoles","jueves");
        sort($semana);
        for ($i=0; $i < count($semana); $i++) { 
            echo $semana[$i] . "<br>"; 
        }
    ?>
</body>
</html>