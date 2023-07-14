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
        setcookie("pruebacookie","esta es la informacion de nuestra primera cookie",
        time()+300,"/php_pildoras/vid64_sesiones_&_cookies/zona_contenidos/");//solo faltaba el slash delante de "php_pildoras"
        //ya no se va poder leer desde el archivo LEERCOOKIE1  pero si del archivo LEERCOOKIE2.
    ?>
</body>
</html>

<!--
    http://localhost/php_pildoras/vid64_sesiones_&_cookies/cookie1.php
-->