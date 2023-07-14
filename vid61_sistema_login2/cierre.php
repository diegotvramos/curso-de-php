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
        session_start(); //reanudamos la session q tenemos abierta.
        session_destroy();
        header("location:login.php");


       /*if(!isset($_SESSION["session_username"])){

            include ("formulario.html");
           }else{
          
            echo "Usuario " .  $_SESSION["session_username"] . "<br>";
          
            echo "<a href='cierre.php'>" . " Cerrar sesion" .  "</a>";
            
           }*/
    ?>
</body>
</html>