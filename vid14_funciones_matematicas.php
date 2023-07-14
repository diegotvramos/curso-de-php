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

    //FUNCIONES MATEMATICAS PREDEFINIDAS.
        //$num1=rand(10,50); //funcion para numeros aleatorios
        //$num1=pow(5,3);   // funcion para exprecion exponencial.
        //$num1=5.6588888;//Redondea un float ojo no ignora la parte decimal
        $num1="5";
        $resultado=(int)$num1;
        //echo "el numero es: ".round($num1,2); // va tener dos decimales si o si
        echo "el numero es: ".$resultado;
        //funcion que te diga que tipo de dato es una variable
        
        echo gettype($resultado);
    ?>
</body>
</html>  