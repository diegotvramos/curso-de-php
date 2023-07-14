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
        //accedemos a la cookie
        if (isset($_COOKIE["pruebacookie"])) {//¿SI ESTO ES VERDAD... me muestras el contenido de la cookie?
            echo $_COOKIE["pruebacookie"];//utilizamos la variable superGlobal es un array, en caso de que no exista dara un error
            //ademas tubimos la precaucion de no cerrar el navegador para que esa cookie no se elimine al cerrar el navegador 
        }else {
            echo "LA COOKIE NO SE HA CREADO";
        }

    ?>
</body>
</html>