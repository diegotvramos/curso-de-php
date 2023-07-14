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
        time()-1,"/php_pildoras/vid64_sesiones_&_cookies/zona_contenidos/");//ZONA_CONTENIDOS es el subdirectorio.| le ponemos tiempo nagativo para destruir la cookie

    ?>
</body>
</html>