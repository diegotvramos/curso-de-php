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
        echo "este es el primer mensaje <br>";
        require ("vid5v2_flujo.php");
        damedatos(); //ya no me funciona cuando llamo desde otro documento
        echo "este es el segundo mensaje <br>";
    ?>
    <?php
        
        /*function damedatos(){
            echo "este es el mensaje del interior de la funcion <br>";
        }*/

        /*dameDatos();
        dameDatos();
        dameDatos();
        dameDatos();*/
        
        //  include ("vid5v2_flujo.php");
        damedatos();
    ?>
</body>
</html>