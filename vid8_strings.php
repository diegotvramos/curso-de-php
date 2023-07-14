<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .resaltar{
            color:#f00;
            font-weight:bold;
        }
    </style>
</head>
<body>
    <?php
        echo "<p class='resaltar' >esto es un ejemplo de frase</p>";

        $variable1="Casass";
        $variable2="CASA";
        $resultado=strcasecmp($variable1,$variable2); //devuelve 1 si no son iguales y 0 si son iguales
        //echo "el resultado es: " . $resultado;
        if (!$resultado) {
            echo "coinciden";
        }else{
            echo"no coinciden";

            /*FUNCIÓN STRCMP

Esta función realiza la comparación segura de Strings y devuelve un 
valor numérico. Su sintaxis habitual es la siguiente: 
if (strcmp ($cadena1 , $cadena2 ) == 0) { … } strcmp es sensible 
a mayúsculas y minúsculas, es decir, no considera igual Martes que martes. */
        }
    ?>
</body>
</html>